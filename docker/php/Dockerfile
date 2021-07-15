FROM php:8.0-cli

RUN apt-get update && apt-get install -y \
    bash \
    unzip \
    && rm -rf /var/lib/apt/lists/*


RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV PATH /fig-website/bin:/fig-website/vendor/sculpin/sculpin/bin:/fig-website/vendor/bin:${PATH}

# setup user
ARG UID=1000
ARG GID=1000
RUN addgroup --gid $GID fig \
    && adduser --disabled-password --ingroup fig --uid $UID fig \
    && mkdir /fig-website \
    && chown fig:fig /fig-website
WORKDIR /fig-website
USER fig
