FROM php:7.1-apache
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y \
    apt-utils \
    curl \
    git \
    make \
    mc \
    nano \
    vim \
    wget \
    zlib1g-dev \
    zip

RUN docker-php-ext-install mysqli

RUN docker-php-ext-install zip

RUN pecl install xdebug-2.6.0

RUN docker-php-ext-enable xdebug

RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown www-data /var/www/html/storage/
RUN chmod 755 /var/www/html/storage/

#RUN composer --version