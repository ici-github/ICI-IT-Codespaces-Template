# Use an official Ubuntu as a parent image
FROM ubuntu:20.04

# Install dependencies and PHP 8.2
RUN apt-get update && apt-get install -y \
    software-properties-common \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update && apt-get install -y \
    php8.2 \
    php8.2-mysql \
    php8.2-mysqli \
    php8.2-pdo \
    php8.2-pdo-mysql \
    apache2 \
    libapache2-mod-php8.2 \
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

# Enable directory listing and set DocumentRoot to /workspace/htdocs
RUN echo '<Directory /workspace/htdocs>' > /etc/apache2/conf-available/directory-listing.conf \
    && echo 'Options Indexes FollowSymLinks' >> /etc/apache2/conf-available/directory-listing.conf \
    && echo 'AllowOverride None' >> /etc/apache2/conf-available/directory-listing.conf \
    && echo 'Require all granted' >> /etc/apache2/conf-available/directory-listing.conf \
    && echo '</Directory>' >> /etc/apache2/conf-available/directory-listing.conf \
    && ln -s /etc/apache2/conf-available/directory-listing.conf /etc/apache2/conf-enabled/directory-listing.conf \
    && sed -i 's|DocumentRoot /var/www/html|DocumentRoot /workspace/htdocs|' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's|<Directory /var/www/>|<Directory /workspace/htdocs/>|' /etc/apache2/apache2.conf

# Remove tzdata package
RUN apt-get remove -y tzdata && apt-get autoremove -y

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
