FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libmagickwand-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick

RUN docker-php-ext-install session

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
