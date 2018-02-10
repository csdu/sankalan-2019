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
aws s3 sync dist/assets/css s3://ducs.in/assets/css --metadata-directive REPLACE --cache-control max-age=2592000 --content-encoding gzip --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

aws s3 sync dist/assets/js s3://ducs.in/assets/js --metadata-directive REPLACE --cache-control max-age=2592000 --content-encoding gzip --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

aws s3 sync dist/assets/images s3://ducs.in/assets/images --metadata-directive REPLACE --cache-control max-age=2592000 --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

# content
aws s3 sync dist/sankalan s3://ducs.in/sankalan --content-encoding gzip --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers
