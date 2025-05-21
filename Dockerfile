FROM php:8.4-cli
LABEL authors="Corné van Pelt"

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/* # Clean up apt cache to keep image size small

RUN docker-php-ext-install zip

WORKDIR /bas

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer