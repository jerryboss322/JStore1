FROM php:8.2-fpm-alpine

WORKDIR /var/www

RUN apk add --no-cache     postgresql-dev     libzip-dev     zip     unzip     git     curl     nodejs     npm

RUN docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
