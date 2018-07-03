let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/assets/js/init-summernote.js', 'public/js');
mix.js('resources/assets/js/init-modal.js', 'public/js');
mix.js('resources/assets/js/init-attachments.js', 'public/js');
mix.js('resources/assets/js/init-datatables.js', 'public/js');
mix.js('resources/assets/js/init-datepicker.js', 'public/js');
