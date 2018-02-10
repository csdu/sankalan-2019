#!/usr/bin/env bash

# build
npm run build:clean
npm run build

# gzip content (html, json)
gzip -rf dist/sankalan

# remove .gz from file names
for file in $(find dist/sankalan -name "*.gz")
do
 mv "$file" "${file%.gz}"
done;

# assets
aws s3 cp --recursive dist/assets/css s3://cdnducsin/assets/css --metadata-directive REPLACE --cache-control max-age=2592000 --content-encoding gzip --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

aws s3 cp --recursive dist/assets/js s3://cdnducsin/assets/js --metadata-directive REPLACE --cache-control max-age=2592000 --content-encoding gzip --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

aws s3 cp --recursive dist/assets/images s3://cdnducsin/assets/images --metadata-directive REPLACE --cache-control max-age=2592000 --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers

# content
aws s3 cp --recursive dist/sankalan s3://cdnducsin/sankalan --content-encoding gzip --grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers
