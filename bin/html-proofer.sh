#!/bin/sh

set -e

htmlproofer output_dev \
  --check-html \
  --check-img-http \
  --check-opengraph \
  --disable-external \
  --url-ignore 'foo-meta.md#errata-1-foo'
