const pug = require('pug');
const path = require('path');

const basePath = path.join(process.cwd(), './src/content');

module.exports = (locals, callback) => {
  const contentPath = path.join(basePath, locals.page.file);
  let contentHtml;
  try {
    contentHtml = pug.renderFile(contentPath, locals);
  } catch (e) {
    console.error(`Error in render-content: ${locals.page.file}`);
    console.error(e);
  }
  return callback(null, contentHtml);
};
