# Base PHP image with Apache
FROM php:8.1-apache

# Set environment variable
ENV DEBIAN_FRONTEND=noninteractive

# Update and install required packages
RUN apt-get update && apt-get install -y --no-install-recommends \
    zip \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    libmagickwand-dev \
    gnupg \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node.js (version 18)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm

# Configure GD for image handling
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Install PHP extensions required by Laravel
RUN docker-php-ext-install pdo pdo_mysql bcmath zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set global timeout in Composer
RUN composer config --global process-timeout 1200

# Enable rewrite module in Apache
RUN a2enmod rewrite

# Copy Apache configuration
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Set the working directory
WORKDIR /var/www/laravel

## Install Laravel project dependencies (Composer and npm)
#RUN composer install && npm install

# Expose port 80
EXPOSE 80

# Run Apache
CMD ["apache2-foreground"]
