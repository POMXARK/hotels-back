FROM php:8-fpm-alpine

RUN apk --no-cache add --virtual .build-deps $PHPIZE_DEPS && docker-php-ext-install mysqli pdo pdo_mysql

RUN apk --no-cache add --virtual .build-deps $PHPIZE_DEPS && pecl install xdebug-3.1.0 && docker-php-ext-enable xdebug