#!/usr/bin/env bash

# directories
d_skln=dist/sankalan
d_css=dist/assets/css
d_js=dist/assets/js
d_img=dist/assets/images

# flags for aws s3
f_permissions="--grants read=uri=http://acs.amazonaws.com/groups/global/AllUsers"
f_encoding="--content-encoding gzip" # for assets only
f_cache="--metadata-directive REPLACE --cache-control max-age=2592000" # for assets only
f_cache_ct="--metadata-directive REPLACE --cache-control max-age=180" # for content only

# s3 buckets
b_cdn=s3://cdn.ducs.in
b_www=s3://www.ducs.in

# build
npm run build:clean
npm run build

# get updated files list in scripts/deploy/tmp.txt
tmpFile=scripts/deploy/tmp.txt
uploadedList=scripts/deploy/uploaded.txt

./scripts/deploy/_get_changed_files.sh

num=$(wc -l < $tmpFile)
echo "files changed: $num"
printf "" > $uploadedList

if [ $num -gt 0 ]; then
  ######### prepare files for upload
  echo "gzipping files..."

  # gzip all, except images
  find $d_skln $d_css $d_js -type f ! -name "*.gz" | xargs gzip -kf

  # move all .gz files to upload dir
  #   while removing .gz suffix from file name
  for f in $(find $d_skln $d_css $d_js -type f -name "*.gz"); do
    d="$(dirname $f)"
    b=${f#dist/}
    mkdir -p dist/upload/"${d#dist/}"
    c="${b%.gz}"
    mv $f dist/upload/$c
  done

  # copy images to upload dir also
  cp -r $d_img/* dist/upload/assets/images/

  ######### upload only changed files
  echo "Connecting to AWS..."
  while read f; do
    if [[ $f == assets/* ]]; then
      rf=${f#assets/}
      if [[ $rf == css/* ]]; then
        aws s3 cp dist/upload/$f $b_cdn/$rf $f_cache $f_encoding $f_permissions
      elif [[ $rf == js/* ]]; then
        aws s3 cp dist/upload/$f $b_cdn/$rf $f_cache $f_encoding $f_permissions
      elif [[ $rf == images/* ]]; then
        aws s3 cp dist/upload/$f $b_cdn/$rf $f_cache $f_permissions
      fi
    elif [[ $f == sankalan/* ]]; then
      aws s3 cp dist/upload/$f $b_www/$f $f_cache_ct $f_encoding $f_permissions
    fi
    echo $f >> $uploadedList
  done < $tmpFile
else
  echo "No files changed."
fi
