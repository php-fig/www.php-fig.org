#!/bin/sh

set -e

npx --yes node-sass \
  --output-style=compressed \
  source/_sass/all.scss \
  output_dev/css/all.css || true
