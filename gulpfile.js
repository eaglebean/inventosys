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

var paths = {
    'vendor': './vendor/bower_components/',
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/',
    'fontawesome': './vendor/bower_components/font-awesome/',
    'sb_admin_2': './vendor/bower_components/startbootstrap-sb-admin-2-sass/'

}

elixir(function(mix) {
    mix.sass(
        "app.scss", 
        'public/css/', 
        {
            includePaths: 
            [
                paths.bootstrap + 'stylesheets/',
                paths.fontawesome + 'scss/',
                paths.sb_admin_2 + 'sass/'
            ]
        }
    )
    .copy(paths.vendor + "jquery/dist/jquery.min.js", 'public/js')

    .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts/bootstrap')
    .copy(paths.fontawesome + 'fonts/**', 'public/fonts')
    .copy(paths.bootstrap + 'javascripts/bootstrap.min.js', 'public/js')
    .copy(paths.vendor + 'metisMenu/dist/metisMenu.min.js', 'public/js')
    .copy(paths.vendor + 'metisMenu/dist/metisMenu.min.css', 'public/css')
    .copy(paths.sb_admin_2 + 'dist/js/sb-admin-2.js', 'public/js')
    .copy(paths.vendor + 'bootbox.js/bootbox.js', 'public/js')
    // pnotify
    .copy(paths.vendor + 'pnotify/dist/*.js', 'public/js')
    .copy(paths.vendor + 'pnotify/dist/*.css', 'public/css')
    // vuejs
    .copy(paths.vendor + 'vue/dist/vue.js', 'public/js')
    .copy(paths.vendor + 'vue-resource/dist/vue-resource.min.js', 'public/js')
    // animate.css
    .copy(paths.vendor + 'animate.css/animate.min.css', 'public/css')
    // selectize
    .copy(paths.vendor + 'selectize/dist/js/standalone/selectize.min.js', 'public/js')
    .copy(paths.vendor + 'selectize/dist/css/selectize.bootstrap3.css', 'public/css')
    


});
