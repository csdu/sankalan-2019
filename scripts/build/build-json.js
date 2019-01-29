const { outputJson } = require('fs-extra');
const { getSavePath } = require('./utils');

const basename = '/sankalan';

const savePath = slug => getSavePath(slug, 'json');

const createJson = (page, content) => ({
  slug: page.slug,
  title: `${page.title + (page.title ? ' // ' : ' ')}Sankalan 2019`,
  link: `${basename}/${page.slug}`,
  content,
});

module.exports = (page, content, callback) => {
  const file = savePath(page.slug);
  const json = createJson(page, content);
  return outputJson(file, json, callback);
};
