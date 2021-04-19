#!/bin/bash

if [ ! -f /application/config.php ]; then
    cd /application

    composer install 

    cd /application/admin/cli

    php install.php --wwwroot="http://127.0.0.1:8081" \
        --dataroot="/moodledata" \
        --dbhost="mysql" \
        --dbtype="mysqli" \
        --dbname="moodle" \
        --dbuser="moodle" \
        --dbpass="moodle" \
        --fullname="Moodle LMS" \
        --shortname="Moodle" \
        --adminuser="admin" \
        --adminpass="nimda" \
        --agree-license \
        --non-interactive
fi

/usr/bin/supervisord -n -c /etc/supervisord.conf