#!/bin/sh
set -e

cd /var/www/html

# Base de datos SQLite persistente (volumen montado en /var/www/html/data)
DB_FILE="${DB_DATABASE:-/var/www/html/data/database.sqlite}"
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ] && [ ! -f "$DB_FILE" ]; then
    echo "Creando base de datos SQLite en $DB_FILE"
    mkdir -p "$(dirname "$DB_FILE")"
    touch "$DB_FILE"
fi

# Permisos de escritura para Apache
chown -R www-data:www-data storage bootstrap/cache "$(dirname "$DB_FILE")" 2>/dev/null || true

if [ -z "$APP_KEY" ]; then
    echo "ERROR: APP_KEY no está definido. Revisa tu archivo .env" >&2
    exit 1
fi

php artisan migrate --force

if [ "${APP_ENV}" = "production" ]; then
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
else
    php artisan optimize:clear
fi

exec "$@"
