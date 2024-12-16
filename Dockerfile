FROM php:8.1-apache

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html
RUN chown -R www-data:www-data /var/www/html/img
RUN chmod -R 777 /var/www/html
RUN chmod -R 777 /var/www/html/img

RUN mkdir -p /tmp/phpuploads \
    && chown -R www-data:www-data /tmp/phpuploads \
    && chmod -R 777 /tmp/phpuploads

RUN echo "upload_tmp_dir = /tmp/phpuploads" > /usr/local/etc/php/conf.d/upload.ini
RUN echo "file_uploads = On" >> /usr/local/etc/php/conf.d/upload.ini
RUN echo "upload_max_filesize = 5M" > /usr/local/etc/php/conf.d/upload-limit.ini
RUN echo "post_max_size = 5M" >> /usr/local/etc/php/conf.d/upload-limit.ini
RUN echo "max_file_uploads = 10" >> /usr/local/etc/php/conf.d/upload-limit.ini

RUN docker-php-ext-install mysqli
