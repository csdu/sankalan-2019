const renderContent = require('./render-content');
const buildPage = require('./build-page');
const buildJson = require('./build-json');
const waterfall = require('async/waterfall');
const applyEach = require('async/applyEach');
const yaml = require('node-yaml');
const path = require('path');
const { paths, assetBasePath } = require('./utils');

paths.eventsData = path.resolve(paths.content, './_data/events.yaml');
paths.sponsorsData = path.resolve(paths.content, './_data/sponsors.yaml');
paths.peopleData = path.resolve(paths.content, './_data/people.yaml');

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
    ? yaml.readSync(paths.eventsData)
    : {};

  const { sponsors } = page.slug.includes('sponsors/')
    ? yaml.readSync(paths.sponsorsData)
    : { sponsors: [] };

  const people = page.slug.includes('team/')
    ? yaml.readSync(paths.peopleData)
    : { sponsors: [] };

  const locals = {
    page,
    events,
    sponsors,
    people,
    assets: { $: assetBasePath },
  };

  return waterfall([
    cb => renderContent(locals, cb),
    (content, cb) => generate(page, content, cb),
  ], callback);
};

module.exports = build;
