const pages = require('./pages');
const map = require('async/map');
// const { now } = require('./utils');
const build = require('./build');
const watcher = require('./watcher');

const init = (watch = false) => {
  // console.log(`[${now()}] Starting 'content build'... `);
  map(pages, build, (err) => {
    if (err) {
      console.error(err);
      return;
    }
    // console.log(`[${now()}] Finished 'content build'`);
    if (watch) {
      watcher();
      // console.log(`[${now()}] Watching Content files for changes...`);
    }
  });
};


module.exports = init;
