# Dockerfile
FROM php:8.2-fpm

# Instala dependências e extensões PHP necessárias para Laravel
RUN apt-get update && apt-get install -y \
  libpng-dev \
  libjpeg-dev \
  libonig-dev \
  libxml2-dev \
  zip \
  unzip \
  curl \
  libzip-dev \
  && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

WORKDIR /var/www
