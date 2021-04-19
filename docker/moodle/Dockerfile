FROM phpdockerio/php74-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install supervisor php7.4-soap php7.4-xmlrpc php7.4-gd php7.4-intl php7.4-mysql \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY ./supervisord.conf /etc/supervisord.conf
COPY ./docker-entrypoint.sh /docker-entrypoint.sh

ENTRYPOINT ["/docker-entrypoint.sh"]