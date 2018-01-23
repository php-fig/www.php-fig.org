#!/usr/bin/env bash

set -e

gem install bundler
bundle install
git clone https://github.com/php-fig/fig-standards source/_includes/fig-standards
vendor/bin/sculpin generate -n
bundle exec sass source/_sass/all.scss:output_dev/css/all.css --style=compressed
bundle exec htmlproofer output_dev --url-ignore 'foo-meta.md#errata-1-foo' --disable-external
