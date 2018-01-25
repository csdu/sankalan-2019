const { outputJson } = require('fs-extra');
const { getSavePath } = require('./utils');

const hostname = 'http://localhost/sankalan';

const savePath = slug => getSavePath(slug, 'json');

const createJson = (page, content) => ({
  build: new Date(),
  slug: page.slug,
  title: page.title,
  link: `${hostname}/${page.slug}`,
  content,
});

module.exports = (page, content, callback) => {
  const file = savePath(page.slug);
  const json = createJson(page, content);
  return outputJson(file, json, callback);
};
