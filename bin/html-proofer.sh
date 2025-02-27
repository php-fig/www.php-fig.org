#!/bin/sh

set -e

gem install bundler:2.6.5
bundle config set path '.bundle'
bundle install

bundle exec htmlproofer output_dev \
  --checks html,images,links,opengraph,scripts \
  --disable-external \
  --ignore-urls 'foo-meta.md#errata-1-foo'
