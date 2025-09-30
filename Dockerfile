FROM php:8.2-fpm

# Instala dependências do sistema e extensões PHP necessárias pro Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libfreetype6-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Copia o Composer (multi-stage)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Expor a porta do php-fpm (interno)
EXPOSE 9000

CMD ["php-fpm"]
