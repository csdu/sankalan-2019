const path = require('path');

const cwd = process.cwd();

module.exports = {
  src: path.join(cwd, './src'),
  dest: path.join(cwd, '../ducs.in'),
  destSankalan: path.join(cwd, '../ducs.in/sankalan'),
  assetManifest: path.resolve(cwd, './src/template/assets.json'),
};
