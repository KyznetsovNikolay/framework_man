FROM php:7.4-fpm

RUN apt-get update
RUN apt-get install -y \
    mc \
    wget \
    htop \
    zlib1g-dev \
    libicu-dev \
    libzip-dev \
    librabbitmq-dev \
    libssh-dev \
    gettext-base \
    g++ \
    git \
    libmpdec-dev \
    libpng-dev \
    ghostscript && apt-get clean

RUN docker-php-ext-configure pcntl \
    && docker-php-ext-install pcntl
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl
RUN pecl install amqp \
    && docker-php-ext-enable amqp
RUN pecl install decimal \
    && docker-php-ext-enable decimal

RUN mkdir -p /www/srv
RUN cd /www/srv && wget https://getcomposer.org/installer && php installer && mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install zip mysqli pdo_mysql

RUN apt-get install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick

ADD php.ini /usr/local/etc/php
WORKDIR /www/srv