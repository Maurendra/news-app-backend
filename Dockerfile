FROM php:8.2-fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql sockets
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY . .
RUN composer install