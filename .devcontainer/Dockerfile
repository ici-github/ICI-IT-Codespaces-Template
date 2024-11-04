# Use an official Ubuntu as a parent image
FROM ubuntu:20.04

# Install dependencies and PHP 8.2
RUN apt-get update && apt-get install -y \
    software-properties-common \
    sudo \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update && apt-get install -y \
    php8.2 \
    php8.2-mysql \
    php8.2-mysqli \
    php8.2-pdo \
    php8.2-pdo-mysql \
    apache2 \
    libapache2-mod-php8.2 \
    mariadb-server \
    mariadb-client \
    wget \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install phpMyAdmin
RUN wget https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.zip -O /tmp/phpmyadmin.zip \
    && unzip /tmp/phpmyadmin.zip -d /usr/share \
    && mv /usr/share/phpMyAdmin-*-all-languages /usr/share/phpmyadmin \
    && rm /tmp/phpmyadmin.zip

# Create /htdocs directory and set permissions
RUN mkdir -p /htdocs && chown -R www-data:www-data /htdocs

# Configure Apache to use /htdocs as the document root
RUN sed -i 's|/var/www/html|/htdocs|g' /etc/apache2/sites-available/000-default.conf

# Configure Apache to serve phpMyAdmin from /phpmyadmin
RUN echo "Alias /phpmyadmin /usr/share/phpmyadmin" > /etc/apache2/conf-available/phpmyadmin.conf \
    && a2enconf phpmyadmin

# Enable Apache mods and start Apache
RUN a2enmod php8.2

# Expose port 80
EXPOSE 80

# Keep the container running by starting Apache in the foreground
CMD ["apachectl", "-D", "FOREGROUND"]