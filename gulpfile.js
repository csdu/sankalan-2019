const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const sass = require('gulp-sass');
const uglifyJs = require('gulp-uglify');
const clean = require('gulp-clean');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const hash = require('gulp-hash');

const pages = require('./scripts/build/init');

const {
  dest: distDir,
  src: srcDir,
  assetManifest,
} = require('./build.config');

const isProduction = process.env.NODE_ENV === 'production';

const paths = {
  sass: {
    src: `${srcDir}/sass/**/*.sass`,
    dest: `${distDir}/assets/css`,
  },
  js: {
    src: [
      'header.js',
    ].map(f => `${srcDir}/js/${f}`),
    dest: `${distDir}/assets/js`,
  },
  assetManifest,
};

const options = {
  uglifyJs: {
    mangle: {
      toplevel: true,
      // reserved: [],
    },
  },
  babel: {
    presets: ['es2015'],
  },
  sass: {
    outputStyle: 'compressed',
  },
  rename: {
    suffix: '.min',
  },
  hash: {
    hash: {
      hashLength: 7,
    },
    js: {
      deleteOld: true,
      sourceDir: paths.js.dest,
    },
    css: {
      deleteOld: true,
      sourceDir: paths.sass.dest,
    },
  },
};

const cleanDist = () =>
  gulp.src([
    `${distDir}/*`,
    paths.assetManifest,
  ], {
    read: false,
  })
    .pipe(clean());

const scripts = () => {
  if (isProduction) {
    return gulp.src(paths.js.src)
      .pipe(concat('bundle.js'))
      .pipe(hash(options.hash.hash))
      .pipe(babel(options.babel))
      .pipe(uglifyJs(options.uglifyJs))
      .pipe(rename(options.rename))
      .pipe(gulp.dest(paths.js.dest))
      .pipe(hash.manifest(paths.assetManifest, options.hash.js))
      .pipe(gulp.dest('.'));
  }
  return gulp.src(paths.js.src)
    .pipe(sourcemaps.init())
    .pipe(concat('bundle.js'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.js.dest));
};

const styles = () => {
  if (isProduction) {
    return gulp.src(paths.sass.src)
      .pipe(hash(options.hash.hash))
      .pipe(rename(options.rename))
      .pipe(gulp.dest(paths.sass.dest))
      .pipe(hash.manifest(paths.assetManifest, options.hash.css))
      .pipe(gulp.dest('.'));
  }
  return gulp.src(paths.sass.src)
    .pipe(sass(options.sass).on('error', sass.logError))
    .pipe(gulp.dest(paths.sass.dest));
};

const build = (done) => {
  const content = (cb) => {
    pages(false);
    cb();
  };
  return gulp.series(
    scripts,
    styles,
    content,
  )(done);
};

const watch = () => {
  const content = (cb) => {
    pages(true);
    cb();
  };
  content(() => {});
  gulp.watch(paths.sass.src, styles);
  gulp.watch(paths.js.src, scripts);
};

module.exports = {
  default: build,
  clean: cleanDist,
  build,
  styles,
  scripts,
  content: (cb) => {
    pages(false);
    cb();
  },
  watch: gulp.series(build, watch),
};
