let mix = require('laravel-mix');
require('laravel-mix-purgecss');
let build = require('./tasks/build.js');
let baseUrl = mix.inProduction() ? '/sankalan/' : '/';

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
    .sass('source/_assets/sass/critical.sass', 'css')
    .purgeCss({
        folders: ['source'],
    })
    .options({
        processCssUrls: false,
        postCss: [
            require('autoprefixer')({
                browsers: 'last 40 versions'
            }),
            require('postcss-url')({
                url: function(asset) {
                    if(asset.url[0] == '/') {
                        return baseUrl + asset.relativePath
                    }
                    return asset.url;
                }
            })
        ]
    }).version();
