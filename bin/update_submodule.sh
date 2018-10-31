#!/usr/bin/env bash

set -e
set -o pipefail

cd $(dirname "$0")/../source/_includes/fig-standards
git pull
