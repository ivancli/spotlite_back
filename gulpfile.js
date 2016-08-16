var del = require('del');
var elixir = require('laravel-elixir');
var gulp = require('gulp');
var task = elixir.Task;

elixir.config.css.minifyCss.pluginOptions.processImport = false;

elixir.config.sourcemaps = false;

elixir.extend('remove', function(path) {
    new task('remove', function() {
        return del(path);
    });
});


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.remove([
        'public/css',
        'public/images/vendor',
        'public/js',
        'public/fonts'
    ]);

    mix.styles([
        'vendor/almasaeed2010/adminlte/bootstrap/css/bootstrap.css',
        'vendor/components/font-awesome/css/font-awesome.css',
        'vendor/driftyco/ionicons/css/ionicons.css',
        'vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css',
        'vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.css'
    ], 'public/assets/css/base.css', './');

    mix.scripts([
        'vendor/almasaeed2010/adminlte/plugins/jQuery/jquery-2.2.3.min.js',
        'vendor/almasaeed2010/adminlte/bootstrap/js/bootstrap.min.js',
        'vendor/almasaeed2010/adminlte/plugins/slimScroll/jquery.slimscroll.min.js',
        'vendor/almasaeed2010/adminlte/plugins/fastclick/fastclick.js',
        'vendor/almasaeed2010/adminlte/dist/js/app.min.js'
    ], 'public/assets/js/base.js', './');
});
