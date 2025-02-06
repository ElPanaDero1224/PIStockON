# Imagen base con PHP 8.3 y Alpine
FROM php:8.3-fpm-alpine

# Instalar dependencias de PHP y Composer
RUN apk add --no-cache \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    zip \
    unzip \
    git \
    curl \
    mysql-client \
    shadow \
    composer \
    php83-tokenizer php83-session php83-fileinfo php83-dom php83-xml php83-bcmath php83-xmlwriter
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd pdo pdo_mysql

# Configuración de Laravel
WORKDIR /var/www

# Copiar archivos de Laravel
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction

# Ajustar permisos
RUN chown -R www-data:www-data . && \
    chmod -R 775 storage bootstrap/cache

CMD ["php-fpm"]
