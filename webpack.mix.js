process.env.NODE_OPTIONS = '--openssl-legacy-provider';
const mix = require('laravel-mix');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.json', '.vue'], // Certifique-se de que '.vue' está incluído.
    },
});

mix.js('resources/js/app.js', 'public/js').vue({
    version: 2})
    .sass('resources/sass/app.scss', 'public/css').sourceMaps();
