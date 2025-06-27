# Utilise une image de base PHP avec FPM (FastCGI Process Manager)
FROM php:8.3-fpm

# Installer les dépendances système et PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail dans le conteneur
WORKDIR /var/www/symfony

# Copier le code du projet dans le conteneur
COPY . .

# Installer les dépendances du projet Symfony
RUN composer install --no-scripts --no-interaction

# Donner les permissions adéquates
RUN chown -R www-data:www-data /var/www/symfony

# Expose le port PHP-FPM pour que le conteneur puisse être accessible
EXPOSE 9000

# Commande par défaut
CMD ["php-fpm"]