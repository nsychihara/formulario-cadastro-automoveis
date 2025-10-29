FROM php:8.2-fpm

RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY ./form /var/www/html

EXPOSE 80   