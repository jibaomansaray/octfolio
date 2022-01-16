FROM php:8.1-cli

RUN apt-get update
RUN apt-get install -y curl git libzip-dev
RUN docker-php-ext-install zip
RUN yes | pecl install xdebug
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer global require "phpunit/phpunit"

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini" && \
    echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.client_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.idekey=VSCODE" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini

ENV PATH /root/.composer/vendor/bin:$PATH

RUN ln -s /root/.composer/vendor/bin/phpunit /usr/bin/phpunit

VOLUME [ "/opt/project" ]
WORKDIR /opt/project