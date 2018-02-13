#!/usr/bin/env bash

# build
npm run build:clean
npm run build

# gzip content
gzip -rf dist/sankalan
gzip -rf dist/assets/css
gzip -rf dist/assets/js

# remove .gz from file names
for file in $(find dist/sankalan -name "*.gz")
do
 mv "$file" "${file%.gz}"
done;
for file in $(find dist/assets/css -name "*.gz")
do
 mv "$file" "${file%.gz}"
done;
for file in $(find dist/assets/js -name "*.gz")
do
 mv "$file" "${file%.gz}"
done;

# assets
aws s3 sync --delete dist/assets/css/www s3://cdn.ducs.in/assets/css/www --metadata-directive REPLACE --cache-control max-age=2592000 --content-encoding gzip --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

aws s3 sync --delete dist/assets/js/www s3://cdn.ducs.in/assets/js/www --metadata-directive REPLACE --cache-control max-age=2592000 --content-encoding gzip --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

aws s3 sync --delete dist/assets/images/www s3://cdn.ducs.in/assets/images/www --metadata-directive REPLACE --cache-control max-age=2592000 --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

# content
aws s3 sync dist/sankalan s3://www.ducs.in/sankalan --content-encoding gzip --metadata-directive REPLACE --cache-control max-age=180 --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers
