#!/usr/bin/env bash

set -e

command -v bundle >/dev/null 2>&1 || { echo >&2 "Bundler is required: http://bundler.io/"; exit 1; }
command -v composer >/dev/null 2>&1 || { echo >&2 "Composer is required: https://getcomposer.org/"; exit 1; }

bundle install --path .bundle
composer install
