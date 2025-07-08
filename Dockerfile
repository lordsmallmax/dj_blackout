# Basis-Image mit PHP 8.3 und Apache
FROM php:8.3-apache

# Benötigte PHP-Extensions installieren
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql mysqli zip

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

RUN a2enmod rewrite 

# Composer installieren
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    php -r "unlink('composer-setup.php');"

# Apache: ServerName setzen (um nervige Warnung zu vermeiden)
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Arbeitsverzeichnis setzen
WORKDIR /var/www/html

# Expose Port 80 (nicht zwingend nötig, aber sauber)
EXPOSE 80
