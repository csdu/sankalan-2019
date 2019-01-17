# Sankalan 2018

This repository contains the source code for Sankalan 2018 website (https://www.ducs.in/sankalan/).

See also: https://github.com/sidvishnoi/dashboard.ducs.in

Sankalan is the annual tech fest of Dept Of Computer Science, University of Delhi (DUCS).

# How to build

Requirements: Node JS (v8.8+), NPM (v5.6) and some npm static website hosting module (like [`live-server`](https://www.npmjs.com/package/live-server)).

``` bash
# clone repo
git clone https://github.com/csdu/sankalan-2018.git
cd sankalan-2018

# install dependencies
npm i

echo {} >> src/templates/assets.json

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

1. Fork and clone your own version of repository.
2. Make edits. (See [Contribution](CONTRIBUTING.md) guide for more detailed information)
3. Preview your edits by running the `npm run build:dev` script.
4. Submit a pull request.

Also, please report any issues you face in website or the build process. 

# Deployment

The current deployment script makes use of `aws-cli` and `git`. You need create an empty git-repo in the dist folder, so thatonly the files that have been actually modified in the build process will be uploaded.

The official website (https://www.ducs.in/sankalan/) is hosted via a combination of AWS S3, Cloudfront and AWS Lambda@Edge.

S3 makes use of two buckets (cdn and www) so the assets in cdn can be cached for longer than www files.

By using a Lambda@Edge function as an "Origin-Request" trigger on cloudfront, we can now have correct responses to paths with/without trailing slashes.

The Cloudfront behaviours for the www distribution look like: 
![Cloudfront Behaviours](https://i.imgur.com/X9Gf0Qz.png)

Only the precedence 4 has Lambda@Edge function as trigger.

This is done to reduce requests on Lambda@Edge, as it becomes expensive. In end, only urls without trailing slashes are being handled by the Lambda@Edge function:

``` js
'use strict';
exports.handler = (event, context, callback) => {
    var request = event.Records[0].cf.request;

    var s = request.uri.toLowerCase();
    
    console.log('URL.in = ', s);
    
    // leave files with extensions as it is
    if (/(?=.*)\.([a-z]{3,4})$/.test(s)) return callback(null, request);

	if (s.substr(-1) === '/') s += 'index.html'
	else if (s.endsWith('/index.html')) { /* do nothing */ }
	else s += '/index.html';

    request.uri = s;
    console.log('URL.out = ', s);

    // Return to CloudFront
    return callback(null, request);

};
```

# Copyright

The website is designed by Sudhanshu Vishnoi (https://github.com/sidvishnoi) for Sankalan 2018 - the annual tech fest of DUCS. Copyright. Give credits if you use any part of it any where.
