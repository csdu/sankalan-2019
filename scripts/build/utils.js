const path = require('path');

const isProduction = process.env.NODE_ENV === 'production';

const {
  destSankalan: baseSavePath,
  assetManifest,
} = require('../../build.config.js');

const cwd = process.cwd();

const paths = {
  template: path.resolve(cwd, './src/template/index.pug'),
  templateDir: path.resolve(cwd, './src/template/'),
  assetManifest,
  content: path.join(cwd, './src/content'),
};

const getSavePath = (slug, ext) =>
  path.format({
    dir: path.join(baseSavePath, slug),
    base: `index.${ext}`,
  });


const basepath = isProduction
  ? 'http://cdn.ducs.in'
  : 'http://localhost:8000';
// convert normal asset filenames to hashed asset paths
const getMappedAssets = (assets) => {
  const mappedAssets = {};
  Object.keys(assets).map((f) => {
    const type = path.extname(f) === '.js'
      ? 'js'
      : 'css'; // for css and sass extname
    mappedAssets[f] = `${basepath}/${type}/www/${assets[f]}`;
    return f;
  });
  mappedAssets.$ = basepath;
  return mappedAssets;
};

const now = () => new Date().toTimeString().split(' ')[0];

module.exports = {
  getSavePath,
  paths,
  now,
  getMappedAssets,
  assetBasePath: basepath,
};
