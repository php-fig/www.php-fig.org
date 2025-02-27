FROM ruby:3.1.2-slim-bullseye

RUN apt-get update \
    && apt-get install -y \
        build-essential \
        curl \
        libffi-dev \
        libzip-dev \
        zip \
    && apt-get clean

# setup user
ARG UID=1000
ARG GID=1000
RUN groupadd -g $GID fig \
    && useradd -g fig -u $UID fig
USER fig

RUN gem install bundler:2.6.5
