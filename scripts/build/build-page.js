const pug = require('pug');
const { outputFile } = require('fs-extra');
const {
  getSavePath,
  paths,
  getMappedAssets,
} = require('./utils');

const savePath = slug => getSavePath(slug, 'html');

module.exports = (page, content, callback) => {
  // eslint-disable-next-line import/no-dynamic-require
  const assets = require(paths.assetManifest);
  const mappedAssets = getMappedAssets(assets);

  const file = savePath(page.slug);
  let html;
  try {
    html = pug.renderFile(paths.template, {
      content,
      page,
      assets: mappedAssets,
    });
  } catch (e) {
    console.error(`Error in build-page: ${page.file}`);
    console.error(e);
  }
  return outputFile(file, html, callback);
};
