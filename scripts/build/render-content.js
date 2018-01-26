const pug = require('pug');
const path = require('path');

const basePath = path.join(process.cwd(), './src/content');

module.exports = (page, callback) => {
  const contentPath = path.join(basePath, page.file);
  const contentHtml = pug.renderFile(contentPath, {
    page,
  });
  return callback(null, contentHtml);
};
