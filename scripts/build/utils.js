const path = require('path');

const {
  destSankalan: baseSavePath,
  assetManifest,
} = require('../../build.config.js');

const paths = {
  template: path.resolve(process.cwd(), './src/template/index.pug'),
  assetManifest,
  content: path.join(process.cwd(), './src/content'),
};

const getSavePath = (slug, ext) =>
  path.format({
    dir: path.join(baseSavePath, slug),
    base: `index.${ext}`,
  });

// convert normal asset filenames to hashed asset paths
const getMappedAssets = (assets) => {
  const mappedAssets = {};
  const basepath = '/assets';
  Object.keys(assets).map((f) => {
    const type = path.extname(f) === '.js'
      ? 'js'
      : 'css';
    mappedAssets[f] = `${basepath}/${type}/${assets[f]}`;
    return f;
  });
  return mappedAssets;
};

const now = () => new Date().toTimeString().split(' ')[0];

module.exports = {
  getSavePath,
  paths,
  now,
  getMappedAssets,
};
