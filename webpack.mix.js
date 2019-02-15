let mix = require('laravel-mix');
require('laravel-mix-purgecss');
require('laravel-mix-tailwind');
let build = require('./tasks/build.js');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch([
            'tailwind.js',
            'source/**/*.md', 
            'source/**/*.php', 
            'source/_assets/**/*.js', 
            'source/**/*.sass', 
            '!source/**/_tmp/*'
        ]),
    ]
});

mix.scripts([
        'source/_assets/js/canvas.js',
        'source/_assets/js/header.js',
    ], 'source/assets/build/js/bundle.js')
    .sass('source/_assets/sass/style.sass', 'css')
    .tailwind()
    .purgeCss({
        folders: ['source'],
    })
    .options({
        processCssUrls: false,
    }).version();
