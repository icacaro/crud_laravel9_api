FROM php:8.1-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libmagickwand-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libcurl3-dev \
    libfontconfig1 \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxrender1 \
    zip \
    zlib1g-dev \
    unzip; \
    pecl install imagick; \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/ \
    && docker-php-ext-install curl pdo_pgsql mbstring exif pcntl bcmath gd
RUN docker-php-ext-enable imagick

# Configure LDAP.
RUN apt-get update \
 && apt-get install libldap2-dev -y \
 && rm -rf /var/lib/apt/lists/* \
 && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
 && docker-php-ext-install ldap

# Instala xdebug
RUN pecl install xdebug-3.1.3 \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
RUN chown -R $user:www-data /var/www

WORKDIR /var/www

USER $user
