FROM php:7.4-apache

# Instalar dependencias de PHP
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        git

# Configurar extensiones de PHP
RUN docker-php-ext-install pdo_mysql zip

# Configurar el documento raíz de Apache
RUN sed -i -e 's/html/html\/public/g' /etc/apache2/sites-available/000-default.conf
RUN sed -i -e 's/html/html\/public/g' /etc/apache2/sites-available/default-ssl.conf

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Configurar las variables de entorno de Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Reiniciar Apache
RUN service apache2 restart

WORKDIR /var/www/html
