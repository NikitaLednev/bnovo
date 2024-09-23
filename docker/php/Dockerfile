FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    ssh-client \
    libpq-dev \
    libxml2-dev \
    libmagickwand-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libcurl3-dev \
    libonig-dev \
    libzip-dev \
    mc \
    unzip \
    zip \
    git \
    curl \
    wget \
    ssh-client \
    libmagick++-dev\
    --no-install-recommends \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_pgsql \
        pdo_mysql \
        mysqli \
        gd \
        exif \
        mbstring \
        bcmath \
        zip \
        xml \
        curl \
        intl \
   && pecl install imagick && docker-php-ext-enable imagick

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.3.4

# Set working directory
WORKDIR /var/www

CMD ["php-fpm"]