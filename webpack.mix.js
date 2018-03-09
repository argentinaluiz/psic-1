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

 //Dois pacotes, um para a parte administrativa e outra para a parte dos usuários
mix.js('resources/assets/admin/js/admin.js', 'public/js')
   .sass('resources/assets/admin/sass/admin.scss', 'public/css');

/*mix.styles([
    'public/css/font-awesome.css',
    'public/css/bootstrap.min.css',
    'public/css/plugins/toastr/toastr.min.css',
    'public/css/animate.css',
    'public/css/style.css'
],  'public/css/all.css'); 
*/
