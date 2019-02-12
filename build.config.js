const path = require('path');

const cwd = process.cwd();

module.exports = {
  src: path.join(cwd, './src'),
  dest: path.join(cwd, './dist/sankalan'),
  destSankalan: path.join(cwd, './dist/sankalan'),
  assetManifest: path.resolve(cwd, './src/template/assets.json'),
};
