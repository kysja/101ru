#!/bin/sh
set -e

cd /var/www/html

# Without this check config:cache would silently cache an empty config
if ! su -s /bin/sh www-data -c 'test -r .env'; then
    echo "www-data (UID 33) can't read .env: on the host run sudo chown root:33 .env && sudo chmod 640 .env" >&2
    exit 1
fi

# storage/app and storage/logs are bind-mounted and may arrive empty; storage/framework isn't mounted and starts empty in every new
# container. Recreate the layout Laravel expects (app/public = the photos)
mkdir -p storage/app/public storage/app/private \
    storage/framework/cache/data storage/framework/sessions storage/framework/views \
    storage/logs
chown -R www-data:www-data storage

# Run artisan as www-data so cache files stay writable by Apache workers
artisan() {
    su -s /bin/sh www-data -c "php artisan $*"
}

artisan config:cache
artisan route:cache
artisan event:cache
artisan view:cache

exec docker-php-entrypoint "$@"
