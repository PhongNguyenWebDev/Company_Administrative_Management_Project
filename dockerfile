FROM php:8.2-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    coreutils \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user

# Set working directory and change ownership
WORKDIR /var/www

# Copy project files into the container
COPY . /var/www

# Set ownership of the project files
RUN chown -R $user:$user /var/www

# Switch to non-root user to run Composer and Artisan commands
USER $user

# Install Composer dependencies and run Laravel Artisan commands
# Cài đặt các phụ thuộc PHP và Laravel
RUN composer install --no-interaction --optimize-autoloader

# Tạo khóa ứng dụng Laravel
RUN php artisan key:generate

# Set the correct permissions for the user to run Laravel correctly
RUN chown -R $user:www-data /var/www/storage /var/www/bootstrap/cache

# Expose the port the app will run on
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
