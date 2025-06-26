# Gunakan image PHP dengan extensions yang diperlukan Laravel
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy semua file ke dalam container
COPY . .

# Install dependencies Laravel
RUN composer install --no-dev --optimize-autoloader

# Salin .env.example jika .env belum ada
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Set permission
RUN chmod -R 775 storage bootstrap/cache

# Expose port (Railway default 8080)
EXPOSE 8080

# Start Laravel on port 8080
CMD php artisan serve --host=0.0.0.0 --port=8080
