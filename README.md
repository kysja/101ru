# Website 101ru.com - Russia in pictures

See: [www.101ru.com](https://www.101ru.com)


## Technologies

- Laravel 13 (PHP 8.5)
- MySQL
- Bootstrap 5.3 (built with Vite)

## Local development

Runs in Docker on the alexu-dev server (`/srv/apps/101ru`) behind the shared Traefik proxy at https://101ru.dev.alexu.dev, with the database `db_101ru` on the shared MySQL container (`DB_HOST=mysql`).

The local `.env` sets `COMPOSE_FILE=compose.dev.yaml`, so plain `docker compose` runs the dev stack.

```bash
docker compose up -d
docker compose exec -u www-data app composer install
docker compose exec -u www-data app php artisan test
```

The `node` service runs the Vite dev server at https://vite-101ru.dev.alexu.dev.

Photos live in `storage/app/public` (`post/`, `slider/`); `public/storage` is a symlink to it (`php artisan storage:link`).

## Production

`compose.yaml` builds the `prod` image (Composer packages and the Vite build baked in) and runs it behind the shared Traefik stack on alexu-cloud. The header of `compose.yaml` lists the `.env` settings and the data folders.

