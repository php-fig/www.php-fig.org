#!/bin/sh

set -e

node-sass \
  --output-style=compressed \
  source/_sass/all.scss \
  output_dev/css/all.css
