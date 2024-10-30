



# Dockerfile for PHP with MySQLi
# Use the PHP Apache image
FROM php:8.1.1-apache

RUN apt-get update && apt-get install -y netcat \
    && docker-php-ext-install mysqli && docker-php-ext-enable mysqli


# Copy the application code to the container
COPY ./ /var/www/html


COPY wait-for-it.sh /usr/local/bin/wait-for-it.sh
RUN chmod +x /usr/local/bin/wait-for-it.sh

# Start with wait-for-it
CMD ["wait-for-it.sh", "db", "3306", "--", "apache2-foreground"]