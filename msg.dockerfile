# Use the official PHP image as base image
FROM php:8.0

# Set the working directory in the container
WORKDIR /var/www/html

RUN echo "messages app"

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
        git \
        curl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the rest of the application code
COPY messenger .

RUN cp .env.example .env

# Copy composer.json and composer.lock
COPY messenger/composer.json messenger/composer.lock ./

# Install project dependencies
RUN composer install

# Generate autoload files
RUN composer dump-autoload

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 and start PHP built-in server
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "9000"]

EXPOSE 9000
