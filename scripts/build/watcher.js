const chokidar = require('chokidar');
const mapValues = require('async/mapValues');
const path = require('path');
const build = require('./build');
const pages = require('./pages');

const {
  now,
  paths,
} = require('./utils');

const $pages = Object.keys(pages).map(k => pages[k]);

const buildOne = (fpath) => {
  const fname = path.relative(paths.content, fpath);
  console.log(`[${now()}] Starting 'Rebuild <${fname}>'... `);
  const page = $pages.find(p => p.file === fname);
  build(page, '', (err) => {
    if (err) return console.error(err);
    return console.log(`[${now()}] Finished 'Rebuild <${fname}>'... `);
  });
};

const buildAll = () => {
  console.log(`[${now()}] Starting 'Rebuild <all>'... `);
  mapValues(pages, build, (err) => {
    if (err) {
      console.error(err);
      return;
    }
    console.log(`[${now()}] Finished 'Rebuild <all>'... `);
  });
};

const clearAssetsCache = () =>
  delete require.cache[require.resolve(paths.assetManifest)];

const watcher = () => {
  const options = {
    ignoreInitial: true,
  };

  const watcherContent = chokidar.watch(paths.content, options);
  watcherContent.on('change', buildOne);

  const watcherAssetHashes = chokidar.watch(paths.assetManifest, options);
  watcherAssetHashes.on('change', () => {
    console.log(`[${now()}] [ALERT] Assets modified.`);
    clearAssetsCache();
    buildAll();
  });

  const watcherTemplate = chokidar.watch(paths.template, options);
  watcherTemplate.on('change', buildAll);
};

module.exports = watcher;
