# Gunakan PHP image CLI terbaru dengan dukungan Composer
FROM php:8.2-cli

# Install dependensi sistem & ekstensi PHP (termasuk PostgreSQL)
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libonig-dev libxml2-dev libpng-dev libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql zip mbstring

# Install Composer (copy dari image Composer resmi)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set direktori kerja
WORKDIR /var/www/html

# Salin seluruh isi project ke dalam container
COPY . .

# Install dependensi Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate app key (tidak wajib di sini, karena bisa isi APP_KEY manual di env)
# RUN php artisan key:generate

# Clear config cache untuk memastikan env baru bisa masuk
RUN php artisan config:clear

# Optional: jalankan migrasi ke database Supabase (jika perlu)
# RUN php artisan migrate --force || true

# Expose port Laravel default (Render membuka port 10000)
EXPOSE 10000

# Perintah untuk menjalankan Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
