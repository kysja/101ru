# syntax=docker/dockerfile:1

# ---------------------------------------------------------------------------
# base: PHP 8.5 + Apache + the extensions the app needs
# pdo_mysql: production uses the shared MySQL stack, local dev the Windows
# MySQL80 service (pdo_sqlite ships with the official image, for tests)
# ---------------------------------------------------------------------------
FROM php:8.5-apache AS base

COPY --from=mlocati/php-extension-installer:2 /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip \
    && rm -rf /var/lib/apt/lists/* \
    && install-php-extensions intl opcache pdo_mysql zip \
    && a2enmod rewrite headers remoteip

COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php/php.ini "$PHP_INI_DIR/conf.d/zz-app.ini"

ENV COMPOSER_HOME=/tmp/composer

WORKDIR /var/www/html

# ---------------------------------------------------------------------------
# dev: code is bind-mounted; www-data is remapped to the host user so files
# written by the app (logs, cache, views) stay editable on the host
# ---------------------------------------------------------------------------
FROM base AS dev

ARG UID=1000
ARG GID=1000

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini" \
    && groupmod -o -g ${GID} www-data \
    && usermod -o -u ${UID} -g ${GID} www-data

# ---------------------------------------------------------------------------
# vendor: production composer dependencies
# ---------------------------------------------------------------------------
FROM base AS vendor

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

# ---------------------------------------------------------------------------
# assets: Vite build into public/build
# ---------------------------------------------------------------------------
FROM node:24-alpine AS assets

WORKDIR /app
COPY package.json package-lock.json .npmrc ./
RUN npm ci

COPY vite.config.js ./
COPY resources ./resources
RUN npm run build

# ---------------------------------------------------------------------------
# prod
# ---------------------------------------------------------------------------
FROM base AS prod

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY docker/php/prod.ini "$PHP_INI_DIR/conf.d/zz-prod.ini"

COPY --from=vendor /var/www/html/vendor ./vendor
COPY . .
COPY --from=assets /app/public/build ./public/build

RUN find /var/www/html/resources -type d -exec chmod 755 {} + \
    && find /var/www/html/resources -type f -exec chmod 644 {} +

# --no-scripts: package:discover boots the app, which needs .env (mounted at
# runtime); Laravel builds bootstrap/cache/packages.php itself on first boot.
# public/storage -> the photos on the public disk (in the storage/ mount)
RUN composer dump-autoload --optimize --no-dev --no-scripts --no-interaction \
    && mkdir -p bootstrap/cache \
    && ln -sfn ../storage/app/public public/storage \
    && chown -R www-data:www-data bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/app-entrypoint
RUN chmod +x /usr/local/bin/app-entrypoint

ENTRYPOINT ["app-entrypoint"]
CMD ["apache2-foreground"]
