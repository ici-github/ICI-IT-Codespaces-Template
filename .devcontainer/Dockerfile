# Use an official Ubuntu as a parent image
FROM ubuntu:20.04

# Install dependencies
RUN apt-get update && apt-get install -y \
    php \
    php-mysql \
    php-mysqli \
    php-pdo \
    php-pdo-mysql \
    apache2 \
    libapache2-mod-php \
    mysql-server \
    wget \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install phpMyAdmin
RUN wget https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.zip -O /tmp/phpmyadmin.zip \
    && unzip /tmp/phpmyadmin.zip -d /usr/share \
    && mv /usr/share/phpMyAdmin-*-all-languages /usr/share/phpmyadmin \
    && rm /tmp/phpmyadmin.zip

# Configure Apache for phpMyAdmin
RUN echo 'Alias /phpmyadmin /usr/share/phpmyadmin' > /etc/apache2/conf-available/phpmyadmin.conf \
    && ln -s /etc/apache2/conf-available/phpmyadmin.conf /etc/apache2/conf-enabled/phpmyadmin.conf

# Enable directory listing
RUN echo '<Directory /var/www/html>' > /etc/apache2/conf-available/directory-listing.conf \
    && echo 'Options Indexes FollowSymLinks' >> /etc/apache2/conf-available/directory-listing.conf \
    && echo 'AllowOverride None' >> /etc/apache2/conf-available/directory-listing.conf \
    && echo 'Require all granted' >> /etc/apache2/conf-available/directory-listing.conf \
    && ln -s /etc/apache2/conf-available/directory-listing.conf /etc/apache2/conf-enabled/directory-listing.conf

# Restart Apache to apply changes
RUN service apache2 restart

# Set the default shell to bash
SHELL ["/bin/bash", "-c"]

# Expose port 80 for the web server
EXPOSE 80

# Start MySQL service and create a sample database and user
RUN service mysql start \
    && mysql -e "CREATE DATABASE mariadb;" \
    && mysql -e "CREATE USER 'mariadb'@'localhost' IDENTIFIED BY 'mariadb';" \
    && mysql -e "GRANT ALL PRIVILEGES ON mariadb.* TO 'mariadb'@'localhost';" \
    && mysql -e "FLUSH PRIVILEGES;"