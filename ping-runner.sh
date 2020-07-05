#!/usr/bin/env bash
DIR_BASE="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

set -E
err_report() {
  trap - ERR
  echo "Error on line $1"
  sleep 1;
  exit 1;
}
trap 'err_report $LINENO' ERR

cd $DIR_BASE

git checkout data.json
git reset --hard origin/master
php ping.php

git add data.json
git commit -m "Updating data.json"
git push

set +E
