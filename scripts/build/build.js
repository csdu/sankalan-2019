const renderContent = require('./render-content');
const buildPage = require('./build-page');
const buildJson = require('./build-json');
const waterfall = require('async/waterfall');
const applyEach = require('async/applyEach');

const generate = (page, content, cb) =>
  applyEach(
    {
      buildPage,
      buildJson,
    },
    page,
    content,
    cb,
  );

const build = (page, key, callback) =>
  waterfall([
    cb => renderContent(page, cb),
    (content, cb) => generate(page, content, cb),
  ], callback);

module.exports = build;
