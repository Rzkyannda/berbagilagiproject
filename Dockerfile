# Gunakan PHP CLI dengan Composer
FROM php:8.2-cli

# Install ekstensi dan alat yang dibutuhkan
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libonig-dev libxml2-dev libpng-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Atur direktori kerja
WORKDIR /var/www/html

# Copy semua file project Laravel ke dalam container
COPY . .

# Install dependensi Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Bersihkan cache konfigurasi
RUN php artisan config:clear

# Expose port default Laravel
EXPOSE 10000

# Jalankan server Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
