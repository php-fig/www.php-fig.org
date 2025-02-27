#!/bin/sh

set -e

npx --yes sass \
  --style=compressed \
  source/_sass/all.scss \
  output_dev/css/all.css
