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

mix.js(['resources/js/app.js'], 'public/js',)
    .vue()
    .css('resources/css/sb-admin.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');

mix.combine([
    'resources/js/sbBundle/jquery.min.js',
    'resources/js/sbBundle/jquery.easing.min.js',
    'resources/js/sbBundle/sb-admin.min.js'
], 'public/js/sbBundle.js');