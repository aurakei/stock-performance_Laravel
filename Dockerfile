# Use the official PHP 8.3 image with extensions
FROM php:8.3-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libpq-dev zip unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www/html

# Copy everything into the container
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose the PHP-FPM port
EXPOSE 9000

CMD ["php-fpm"]
