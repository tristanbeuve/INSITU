# Utilise une image de base PHP avec FPM (FastCGI Process Manager)
FROM php:8.3-fpm

# Installer les dépendances système et PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    zip \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    gcc \
    make \
    autoconf \
    libc-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Installer les extensions PECL pour MongoDB et Redis
RUN pecl install mongodb \
    && pecl install redis \
    && docker-php-ext-enable mongodb redis


# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cloner ton repo dans /var/www/symfony
RUN git clone https://$GITHUB_TOKEN@github.com/tristanbeuve/INSITU.git /var/www/symfony

# Se placer dans le dossier de ton app
WORKDIR /var/www/symfony

# Installer les dépendances
RUN composer install --no-scripts --no-interaction

# Donner les permissions adéquates
RUN chown -R www-data:www-data /var/www/symfony

# Expose le port PHP-FPM pour que le conteneur puisse être accessible
EXPOSE 9000

# Commande par défaut
CMD ["php-fpm"]
