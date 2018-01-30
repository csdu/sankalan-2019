const renderContent = require('./render-content');
const buildPage = require('./build-page');
const buildJson = require('./build-json');
const waterfall = require('async/waterfall');
const applyEach = require('async/applyEach');
const yaml = require('node-yaml');

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

const build = (page, callback) => {
  const events = page.slug.includes('events/')
    ? yaml.readSync('../../src/content/events.yaml')
    : {};

  const { sponsors } = page.slug.includes('sponsors/')
    ? yaml.readSync('../../src/content/sponsors.yaml')
    : { sponsors: [] };

  return waterfall([
    cb => renderContent({
      page,
      events,
      sponsors,
    }, cb),
    (content, cb) => generate(page, content, cb),
  ], callback);
};

module.exports = build;
