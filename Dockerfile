FROM ruby:2.4-alpine3.6 as ruby
FROM php:7.2-alpine3.6 as build

COPY --from=ruby /usr/local /usr/local

# since this is an intermediate layer, we can safely use as many RUN layers as we want, and take advantage of granular caching.

RUN apk add --no-cache yaml build-base libffi-dev zlib-dev git zip

# workaround for https://github.com/docker-library/php/issues/240
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/testing/ gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) zip
RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require hirak/prestissimo

WORKDIR /app
COPY . /app
RUN bundle install
RUN composer install
RUN bin/build.sh

FROM nginx:alpine as nginx

RUN sed -i '11i try_files $uri $uri/index.html $uri/ =404;' /etc/nginx/conf.d/default.conf
COPY --from=build /app/output_dev /usr/share/nginx/html
