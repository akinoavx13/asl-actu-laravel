var elixir = require('laravel-elixir');

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

elixir(function (mix) {
    mix.styles([
        'bootstrap.min.css',
        'plugins/dataTables/dataTables.bootstrap.css',
        'plugins/dataTables/dataTables.responsive.css',
        'plugins/dataTables/dataTables.tableTools.min.css'
    ], 'public/css/app.min.css');

    mix.scripts([
        'jquery-3.1.0.min.js',
        'bootstrap.min.js',
        'plugins/dataTables/jquery.dataTables.js',
        'plugins/dataTables/dataTables.bootstrap.js',
        'plugins/dataTables/dataTables.responsive.js',
        'plugins/dataTables/dataTables.tableTools.min.js'
    ], 'public/js/app.min.js')
});