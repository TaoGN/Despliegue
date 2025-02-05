# Imagen base
FROM php:8.2-cli

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql

# Instala Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de Laravel al contenedor
COPY . .

# Instala dependencias de Laravel
RUN composer install --no-scripts --no-autoloader && \
    composer dump-autoload

# Establece permisos adecuados
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto del servidor Laravel
EXPOSE 8000

# Ejecuta migraciones, seeders y luego iniciar Laravel
CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php -S 0.0.0.0:8000 -t public"]
