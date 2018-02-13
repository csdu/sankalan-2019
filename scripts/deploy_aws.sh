#!/usr/bin/env bash

# build
npm run build:clean
npm run build

# directories
d_skln=dist/sankalan
d_css=dist/assets/css
d_js=dist/assets/js
d_img=dist/assets/images

# flags
f_permissions="--grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers"
f_encoding="--content-encoding gzip" # for assets only
f_cache="--metadata-directive REPLACE --cache-control max-age=2592000" # for assets only
f_cache_ct="--metadata-directive REPLACE --cache-control max-age=180" # for content only

# buckets
b_cdn=s3://cdn.ducs.in
b_www=s3://www.ducs.in

# gzip all, except images
gzip -rf $d_skln $d_css $d_js

# remove .gz from file names
for file in $(find $d_skln $d_css $d_js -name "*.gz")
do
 mv "$file" "${file%.gz}"
done;

echo "Connecting to AWS..."

# upload assets
aws s3 sync --delete $d_css/www $b_cdn/css/www $f_cache $f_encoding $f_permissions

aws s3 sync --delete $d_js/www $b_cdn/js/www $f_cache $f_encoding $f_permissions

aws s3 sync --delete $d_img/www $b_cdn/images/www $f_cache $f_permissions

# upload content
aws s3 sync --delete $d_skln $b_www/sankalan $f_encoding $f_cache_ct $f_permissions
