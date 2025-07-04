FROM wordpress:6.5.5-php8.2-apache

# Install Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Configure Xdebug
COPY ./.docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Configure PHP for larger uploads and longer timeouts
COPY ./.docker/php/uploads.ini /usr/local/etc/php/conf.d/uploads.ini
