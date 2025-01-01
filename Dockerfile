# 使用官方的PHP 8.1镜像作为基础镜像
FROM php:8.1-fpm

# 安装必要的扩展
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql zip bcmath

# 安装Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 设置工作目录
WORKDIR /var/www/html

# 复制项目文件到工作目录
COPY . .

# 安装项目依赖
RUN composer install --no-dev --optimize-autoloader

# 暴露9000端口
EXPOSE 9000

# 启动PHP-FPM
CMD ["php-fpm"]
