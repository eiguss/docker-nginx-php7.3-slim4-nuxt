FROM php:7.3-fpm
LABEL maintainer="Eiguss <roberto.martinez.q@gmail.com>"

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

RUN apt-get update && apt-get install -y \
        git \
        vim \
        wget \
        zlib1g-dev \
        zip \
        libzip-dev \
        && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - && apt-get install -y nodejs
RUN pecl install xdebug && docker-php-ext-enable xdebug