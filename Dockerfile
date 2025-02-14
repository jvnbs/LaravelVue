# Base Image
FROM php:8.2-apache

# Copy current folder content into container
COPY . /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
