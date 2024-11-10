# Usa una imagen de PHP con Apache
FROM php:7.4-apache

# Instala la extensión mysqli
RUN docker-php-ext-install mysqli

# Copia todos los archivos PHP al directorio público de Apache
COPY . /var/www/html/

# Expone el puerto 80 para el contenedor
EXPOSE 80

