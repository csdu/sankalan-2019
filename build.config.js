const path = require('path');

const cwd = process.cwd();

module.exports = {
  src: path.join(cwd, './src'),
  dest: path.join(cwd, './dist/sankalan/2019'),
  destSankalan: path.join(cwd, './dist/sankalan/2019'),
  assetManifest: path.resolve(cwd, './src/template/assets.json'),
};
