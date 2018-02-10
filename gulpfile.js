const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const sass = require('gulp-sass');
const uglifyJs = require('gulp-uglify');
const clean = require('gulp-clean');
const concat = require('gulp-concat');
const hash = require('gulp-hash');
const cleanCSS = require('gulp-clean-css');

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
      'canvas.js',
      'router.js',
    ].map(f => `${srcDir}/js/${f}`),
    dest: `${distDir}/assets/js`,
  },
  images: {
    src: `${srcDir}/images/**/*`,
    dest: `${distDir}/assets/images`,
  },
  fonts: {
    src: `${srcDir}/fonts/**/*`,
    dest: `${distDir}/assets/fonts`,
  },
  assetManifest,
};

const options = {
  uglifyJs: {
    mangle: {
      toplevel: true,
      // reserved: [],
    },
    output: {
      comments: 'some',
    },
  },
  babel: {
    presets: ['es2015'],
  },
  sass: {
    outputStyle: 'compressed',
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

const fonts = () =>
  gulp.src(paths.fonts.src, {
    since: gulp.lastRun(fonts),
  })
    .pipe(gulp.dest(paths.fonts.dest));

const styles = () => {
  if (isProduction) {
    return gulp.src(paths.sass.src)
      .pipe(sass(options.sass).on('error', sass.logError))
      .pipe(hash(options.hash.hash))
      .pipe(cleanCSS())
      .pipe(gulp.dest(paths.sass.dest))
      .pipe(hash.manifest(paths.assetManifest, options.hash.css))
      .pipe(gulp.dest('.'));
  }
  return gulp.src(paths.sass.src)
    .pipe(sass(options.sass).on('error', sass.logError))
    .pipe(gulp.dest(paths.sass.dest));
};

const images = () =>
  gulp.src(paths.images.src, {
    since: gulp.lastRun(images),
  })
    .pipe(gulp.dest(paths.images.dest));

const build = (done) => {
  const content = (cb) => {
    pages(false);
    cb();
  };
  return gulp.series(
    scripts,
    styles,
    content,
    images,
    fonts,
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
  gulp.watch(paths.images.src, images);
  gulp.watch(paths.fonts.src, fonts);
};

module.exports = {
  default: build,
  clean: cleanDist,
  build,
  styles,
  scripts,
  images,
  fonts,
  content: (cb) => {
    pages(false);
    cb();
  },
  watch: gulp.series(build, watch),
};
