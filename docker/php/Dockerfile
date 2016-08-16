FROM php:7.0-apache

MAINTAINER Łukasz Krzyszczak <lukasz.krzyszczak@gmail.com>

RUN apt-get update && apt-get install -y \
    curl \
    git \
    libicu-dev \
    zlib1g-dev

RUN docker-php-ext-install \
    intl \
    opcache \
    zip \
 && pecl install xdebug \
 && docker-php-ext-enable xdebug

COPY php.ini /usr/local/etc/php
COPY apache2.conf /etc/apache2/apache2.conf

RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

# Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Symfony
RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
RUN chmod a+x /usr/local/bin/symfony
