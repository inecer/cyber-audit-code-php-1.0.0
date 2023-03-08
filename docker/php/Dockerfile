FROM php:5.6-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
     locales \
     apt-utils \
     git \
     libicu-dev \
     g++ \
     libpng-dev \
     libxml2-dev \
     libzip-dev \
     libonig-dev \
     libxslt-dev \
     libssh-dev

RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

#Docker extension
RUN echo "Installation et configuration des extensions"
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl

#Ouverture des droits de lecture, modification et execution
RUN echo "Ouverture des droits de lecture, modification et execution"
RUN chmod 777 -R /var/www

# Configuration du WORKDIR
RUN echo "Configuration du WORKDIR"
WORKDIR /var/www/