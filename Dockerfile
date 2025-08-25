# Image PHP CLI (suffit pour l'app + serveur PHP intégré)
FROM php:8.2-cli

# Installer dépendances système & extensions PHP utiles
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpq-dev libonig-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier les sources
WORKDIR /var/www/html
COPY . .

# Installer les dépendances PHP (prod)
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader

# Optimisations Laravel (ok si APP_KEY présente à l’exécution)
# On laisse en post-deploy sur Render pour éviter d'échouer si APP_KEY pas encore connue

# Exposer le port (Render passera $PORT)
EXPOSE 10000

# Commande de démarrage : serveur PHP intégré sur $PORT
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
