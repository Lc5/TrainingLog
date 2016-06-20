FROM php:7.0-apache

MAINTAINER Łukasz Krzyszczak <lukasz.krzyszczak@gmail.com>

RUN apt-get update && apt-get install -y \
    curl

RUN docker-php-ext-install \
    pdo_mysql \
    mysqli

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
RUN chmod a+x /usr/local/bin/symfony
