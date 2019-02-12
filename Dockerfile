FROM ruby:2.3-alpine3.8 as ruby
FROM php:7.3-alpine3.8 as dev

COPY --from=ruby /usr/local /usr/local

# since this is an intermediate layer, we can safely use as many RUN layers as we want, and take advantage of granular caching.

RUN apk add --no-cache yaml build-base libffi-dev libzip-dev git zip bash

# workaround for https://github.com/docker-library/php/issues/240
RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/testing/ gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) zip
RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV PATH /fig-website/bin:/fig-website/vendor/bin:${PATH}

# setup user
ARG UID=1000
ARG GID=1000
RUN addgroup -g $GID fig && adduser -D -G fig -u $UID fig \
    && mkdir /fig-website \
    && chown fig:fig /fig-website
WORKDIR /fig-website
USER fig

RUN composer global require hirak/prestissimo

CMD bash

FROM dev as build

COPY --chown=fig:fig . /fig-website
RUN bundle install --path .bundle && composer install
RUN build.sh

FROM nginx:alpine as nginx

RUN sed -i '11i try_files $uri $uri/index.html $uri/ =404;' /etc/nginx/conf.d/default.conf
COPY --from=build /fig-website/output_dev /usr/share/nginx/html
