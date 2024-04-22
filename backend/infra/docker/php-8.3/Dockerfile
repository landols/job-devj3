FROM php:8.3.6-fpm-bookworm

RUN docker-php-ext-install -j$(nproc) \
    pdo_mysql

RUN curl -1sLf https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh | bash \
    && apt-get -y update \
    && apt-get -y install symfony-cli default-mysql-client unzip sudo \
    && apt-get -y clean \
    && curl -sSk https://getcomposer.org/installer | php -- --install-dir /usr/local/bin --filename composer

RUN useradd -u 1000 -G sudo -s /bin/bash -m php \
    && echo root:php | chpasswd \
    && echo php:php | chpasswd
