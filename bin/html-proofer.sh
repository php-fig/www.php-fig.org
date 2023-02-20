#!/bin/sh

set -e

gem install bundler:2.3.26
bundle update --bundler
bundle install --path .bundle

bundle exec htmlproofer output_dev \
  --check-html \
  --check-img-http \
  --check-opengraph \
  --disable-external \
  --url-ignore 'foo-meta.md#errata-1-foo'
