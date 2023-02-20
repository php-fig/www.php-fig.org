FROM ruby:2.5-alpine3.13

RUN apk add --no-cache \
        build-base \
        curl \
        libffi-dev \
        libzip-dev \
        zip

# setup user
ARG UID=1000
ARG GID=1000
RUN addgroup -g $GID fig && adduser -D -G fig -u $UID fig
USER fig

# update to bundler 2.0
RUN gem install bundler:2.3.26
