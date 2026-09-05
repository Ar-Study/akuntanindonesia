FROM php:8.3-fpm-alpine

# Install system dependencies
RUN apk update && apk add --no-cache \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    oniguruma-dev \
    sqlite \
    sqlite-dev \
    bash

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite mbstring bcmath exif pcntl gd

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Set proper permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
