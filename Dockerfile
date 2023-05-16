FROM wordpress:6.2.0-fpm
WORKDIR /usr/src/wordpress
COPY custom-theme/ ./wp-content/themes/custom-theme/