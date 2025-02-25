#!/bin/sh

set -e

gem install bundler:2.6.5
bundle update --bundler
bundle config set path '.bundle'
bundle install

bundle exec htmlproofer output_dev \
  --check-html \
  --check-img-http \
  --check-opengraph \
  --disable-external \
  --url-ignore 'foo-meta.md#errata-1-foo'
