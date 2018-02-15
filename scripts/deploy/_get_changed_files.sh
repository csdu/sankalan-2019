#!/usr/bin/env bash

filesChanged=../scripts/deploy/tmp.txt

cd dist
git add .
git diff --staged --name-only --diff-filter=AM > $filesChanged
git commit -q -m "update" > /dev/null
cd ..
