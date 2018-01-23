#!/usr/bin/env sh

set -e

gem install bundler
bundle install
vendor/bin/sculpin generate -n
bundle exec sass source/_sass/all.scss:output_dev/css/all.css --style=compressed
bundle exec htmlproofer output_dev --url-ignore 'foo-meta.md#errata-1-foo' --disable-external
