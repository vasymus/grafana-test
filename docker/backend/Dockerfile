FROM php:8.2-apache

RUN apt-get update && apt-get install --no-install-recommends --no-install-suggests -y \
    curl \
    wget \
    git \
    zip \
    unzip \
    # install php extensions
    # using mlocati/docker-php-extension-installer recomended by official php docker repo
    # @see https://github.com/docker-library/docs/blob/master/php/README.md#php-core-extensions
    && curl -sSLf -o /usr/local/bin/install-php-extensions https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions \
    && chmod +x /usr/local/bin/install-php-extensions \
    && install-php-extensions \
    curl \
    json \
    zip

COPY --from=composer:2.6.5 /usr/bin/composer /usr/bin/composer

COPY ./docker/backend/servername.conf /etc/apache2/sites-enabled/servername.conf
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
