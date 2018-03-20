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

// Parte do Site

// Parte do Paciente
mix.js('resources/assets/spa/js/spa.js', 'public/js')
    .sass('resources/assets/spa/sass/spa.scss', 'public/css');

// Parte Administrativa
mix.js('resources/assets/admin/js/admin.js', 'public/js')
    .sass('resources/assets/admin/sass/admin.scss', 'public/css');

// Para ambos
mix.styles([
    'resources/assets/admin/css/font-awesome.min.css',
    'resources/assets/admin/css/bootstrap.min.css',
    'resources/assets/admin/css/plugins/toastr/toastr.min.css',
    'resources/assets/admin/css/animate.css',
    'resources/assets/admin/css/style.css'
],  'public/css/themeStyle.css'); 

mix.scripts([
    'resources/assets/admin/js/plugins/metisMenu/jquery.metisMenu.js',
    'resources/assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js',
    'resources/assets/admin/js/plugins/pace/pace.min.js',
],'public/js/plugins.js');

mix.copy('resources/assets/admin/js/appCart.js','public/js/appCart.js');
mix.copy('resources/assets/admin/js/atendimento.js','public/js/atendimento.js');

//Carrega o brownser automaticamente, veirificando se há um novo arquivo na pasta public. Serve também como proxy, e acessa a porta 3000
mix.browserSync('localhost:8000');






/*Copiar um arquivo do node_modules para a pasta public
    mix.copy('node_modules/font-awesome/fonts','public/fonts')
    .copy('node_modules/font-awesome/css/font-awesome.min.css','public/css/font-awesome.min.css');

    mix.copy('node_modules/jquery/dist/jquery.min.js','public/js/jquery.min.js');
*/

/*mix.copy('node_modules/font-awesome/fonts','public/fonts')
    .copy('node_modules/bootstrap/dist/fonts','public/fonts');
*/