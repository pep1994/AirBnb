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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/createApartment.js', 'public/js')
    .js('resources/js/edit.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/tomtom_show.js', 'public/js')
    .js('resources/js/tomtom_home.js', 'public/js')
    .js('resources/js/login.js', 'public/js')
    .js('resources/js/tomtom_search.js', 'public/js')
    .js('resources/js/stats.js', 'public/js')
    .js('resources/js/sponsor_apt.js', 'public/js')
    .js('resources/js/checkInput.js', 'public/js')
    .js('resources/js/chiSiamo.js', 'public/js');


mix.options({
    processCssUrls: false
});
