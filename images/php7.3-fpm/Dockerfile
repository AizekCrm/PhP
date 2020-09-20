FROM php:7.3-fpm

RUN curl -sL https://deb.nodesource.com/setup_13.x  | bash -
RUN curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update -y \
    && apt-get install -y \
        git \
        libicu-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libsqlite3-dev \
        libedit-dev \
        libbz2-dev \
        libcurl4-openssl-dev \
        libzip-dev \
        nodejs \
        yarn \
        nano \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) pdo_sqlite readline zip gd json intl opcache pdo_mysql mysqli mbstring bz2 calendar curl fileinfo exif gettext iconv hash

RUN docker-php-ext-enable opcache

#COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#MONGO-EXT
RUN pecl install mongodb \
ADD php.ini /usr/local/etc/php/conf.d/php.ini
RUN docker-php-ext-enable /usr/local/lib/php/extensions/no-debug-non-zts-20180731/mongodb.so

WORKDIR /var/www
CMD ["php-fpm"]
