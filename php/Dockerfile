ARG PHP_VER

FROM php:${PHP_VER}

ARG SWOOLE_VER

ENV IMAGICK_VER=3.4.4 MCRYPT_VER=1.0.4 COMPOSER_URL=https://mirrors.aliyun.com/composer/
ENV PHP_REDIS_VER=5.3.2 SWOOLE_VER=4.6.0

ADD ./install/swoole-${SWOOLE_VER}.tgz /tmp/
ADD ./install/redis-${PHP_REDIS_VER}.tgz /tmp/
ADD ./install/imagick-${IMAGICK_VER}.tgz /tmp/
ADD ./install/mcrypt-${MCRYPT_VER}.tgz /tmp/

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
    && apk update\
    && apk add --no-cache autoconf g++ libtool make curl-dev libxml2-dev linux-headers libmcrypt libmcrypt-dev freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev gettext-dev libzip-dev file-dev imagemagick-dev\
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) mysqli pdo_mysql zip opcache gettext sockets gd bcmath \
    && cd /tmp/redis-${PHP_REDIS_VER} && phpize && ./configure && make && make install \
    && cd /tmp/swoole-${SWOOLE_VER} && phpize && ./configure && make && make install \
    && cd /tmp/imagick-${IMAGICK_VER} && phpize && ./configure && make && make install \
    && cd /tmp/mcrypt-${MCRYPT_VER} && phpize && ./configure && make && make install \
    && docker-php-ext-enable swoole redis imagick mcrypt\
    && docker-php-source delete \
    && rm -rf /tmp/* \
ENV COMPOSER_HOME /root/composer
RUN curl -sS https://install.phpcomposer.com/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH $COMPOSER_HOME/vendor/bin:$PATH
RUN composer config -g repo.packagist composer ${COMPOSER_URL}
WORKDIR /var/www