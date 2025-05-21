FROM php:8.4-cli
LABEL authors="Corné van Pelt"

WORKDIR /bas

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer