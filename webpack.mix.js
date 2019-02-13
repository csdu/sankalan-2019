let mix = require('laravel-mix');
let build = require('./tasks/build.js');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch(['source/**/*.md', 'source/**/*.php', 'source/**/*.sass', '!source/**/_tmp/*']),
    ]
});

mix.scripts([
        'source/_assets/js/canvas.js',
        'source/_assets/js/header.js',
    ], 'source/assets/build/js/bundle.js')
    .sass('source/_assets/sass/style.sass', 'css')
    .options({
        processCssUrls: false,
    }).version();
