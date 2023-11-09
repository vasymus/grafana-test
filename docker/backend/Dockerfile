FROM php:8.2-apache

COPY --from=composer:2.6.5 /usr/bin/composer /usr/bin/composer

COPY ./docker/backend/servername.conf /etc/apache2/sites-enabled/servername.conf
