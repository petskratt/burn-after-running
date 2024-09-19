# Just a small vulnerable PHP app for WAF demo
# based on https://stackoverflow.com/questions/46332919/combining-php-fpm-with-nginx-in-one-dockerfile
# that I found on stackoverflow and customised with much care (why not add db as well?)

FROM php:fpm

USER root

RUN apt-get update -y \
    && apt-get install -y nginx

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install opcache \
    && apt-get install libicu-dev -y \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && apt-get remove libicu-dev icu-devtools -y
RUN { \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=4000'; \
        echo 'opcache.revalidate_freq=2'; \
        echo 'opcache.fast_shutdown=1'; \
        echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/php-opocache-cfg.ini

COPY nginx-site.conf /etc/nginx/sites-enabled/default
COPY entrypoint.sh /etc/entrypoint.sh

COPY --chown=www-data:www-data . /var/www/mysite

WORKDIR /var/www/mysite

EXPOSE 80

ENTRYPOINT ["/etc/entrypoint.sh"]