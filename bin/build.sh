#!/usr/bin/env bash

set -e

vendor/bin/sculpin generate -n --clean
bundle exec sass source/_sass/all.scss:output_dev/css/all.css --style=compressed
bundle exec htmlproofer output_dev --url-ignore 'foo-meta.md#errata-1-foo' --disable-external
