const path = require('path');

const cwd = process.cwd();

module.exports = {
  src: path.join(cwd, './src'),
  dest: path.join(cwd, './dist'),
  destSankalan: path.join(cwd, './dist'),
  assetManifest: path.resolve(cwd, './src/template/assets.json'),
};
