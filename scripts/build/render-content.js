const pug = require('pug');
const path = require('path');

const basePath = path.join(process.cwd(), './src/content');

module.exports = (locals, callback) => {
  const contentPath = path.join(basePath, locals.page.file);
  const contentHtml = pug.renderFile(contentPath, locals);
  return callback(null, contentHtml);
};
