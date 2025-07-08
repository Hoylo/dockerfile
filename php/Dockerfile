ARG PHP_VER

FROM php:${PHP_VER}

ARG SWOOLE_VER
ARG PHP_REDIS_VER
ARG COMPOSER_URL

ADD ./install/swoole-${SWOOLE_VER}.tgz /tmp/
ADD ./install/redis-${PHP_REDIS_VER}.tgz /tmp/
ADD ./install/xdebug-3.0.4.tgz /tmp/

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
    && apk update\
    && apk add --no-cache autoconf g++ libtool make curl-dev libxml2-dev linux-headers libmcrypt libmcrypt-dev freetype libpng libjpeg-turbo freetype-dev libpng-dev jpeg-dev libjpeg libjpeg-turbo-dev gettext-dev libzip-dev icu-dev libxslt-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) mysqli pdo_mysql zip opcache gettext sockets gd bcmath intl soap xsl \
    && cd /tmp/redis-${PHP_REDIS_VER} && phpize && ./configure \
    --enable-openssl --enable-http2 && make && make install \
    && cd /tmp/xdebug-3.0.4 && phpize && ./configure && make && make install \
    && docker-php-ext-enable redis xdebug\
    && docker-php-source delete \
    && rm -rf /tmp/* \installer
ENV COMPOSER_HOME /root/composer
RUN curl -sS https://install.phpcomposer.com/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH $COMPOSER_HOME/vendor/bin:$PATH
RUN composer config -g repo.packagist composer ${COMPOSER_URL}
WORKDIR /var/www