FROM php:7.4.13-fpm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

COPY ./runtime-environment/php/build/sources.list /home/resource/

RUN set -eux;rm -rf /etc/apt/sources.list.d/buster.list;mv /home/resource/sources.list /etc/apt/sources.list;

RUN install-php-extensions apcu bcmath bz2 calendar decimal gd mcrypt memcached mongodb mysqli \
opcache pdo_mysql rdkafka redis soap sockets ssh2 solr uuid xdebug xhprof yaml zip