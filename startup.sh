#!/bin/bash

# Check if Apache is running, if not, start it
if ! pgrep -x "apache2" > /dev/null
then
    echo "Starting Apache..."
    apachectl -D FOREGROUND &
else
    echo "Apache is already running."
fi

# Check if MySQL is running, if not, start it
if ! pgrep -x "mysqld" > /dev/null
then
    echo "Starting MySQL..."
    service mysql start
else
    echo "MySQL is already running."
fi

# Keep the script running to prevent the container from exiting
tail -f /dev/null