const { init } = require('./build');

const watch = process.argv[2] === '--watch';

init(watch);
