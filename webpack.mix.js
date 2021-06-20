const mix = require("laravel-mix");
var LiveReloadPlugin = require("webpack-livereload-plugin");
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .webpackConfig({
    plugins: [new LiveReloadPlugin()],
    stats: {
      children: true,
    },
  })
  .js("src/app.js", "assets/js/main.js")
  .sass("src/main.scss", "assets/css/main.css");
