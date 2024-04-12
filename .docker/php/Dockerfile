FROM php:8.3.4
RUN apt update
RUN apt install -y git sudo unzip libzip-dev
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN docker-php-ext-install zip bcmath


RUN useradd -m user --uid 1000 -s /usr/bin/bash
RUN echo "user:user" | chpasswd
RUN usermod -aG sudo user
USER user