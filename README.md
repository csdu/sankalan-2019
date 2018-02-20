# Sankalan 2018

This repository contains the source code for Sankalan 2018 website (https://www.ducs.in/sankalan/).

Sankalan is the annual tech fest of Dept Of Computer Science, University of Delhi (DUCS).

# How to build

Requirements: Node JS (v8.8+), NPM (v5.6) and some npm static website hosting module (like [`live-server`](https://www.npmjs.com/package/live-server)).

``` bash
# clone repo
git clone https://github.com/sidvishnoi/sankalan-2018.git
cd sankalan-2018

# install dependencies
npm i

# create a dev build
npm run build:dev

# open browser with the built website at port 8080
live-server ./dist --port=8080

# and navigate to /sankalan/ in browser
```

Please use port 8080 to view website. If you want to use some other port or url, please edit it as the `basepath` ( = `'http://localhost:8080/assets'`) in `./scripts/build/utils.js`.

If you need to test the website in some other device, make sure you edit the `basepath`'s hostname to that of the device running the build server.

# Suggest edits

I'll archive this repository when the fest is done. So make sure you give your edits before that. (Would be meaningless otherwise)

1. Fork and clone the repository.
2. Make edits.
3. Preview your edits by running the `npm run build:dev` script.
4. Submit a pull request.

Also, please report any issues you face in website or the build process.

# Copyright

The website is designed by Sudhanshu Vishnoi (https://github.com/sidvishnoi) for Sankalan 2018 - the annual tech fest of DUCS. Copyright. Give credits if you use any part of it any where.
