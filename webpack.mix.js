const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const mix = require("laravel-mix");

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

mix
    .js("resources/js/Noticias/noticias.js", "public/js/noticias.js")
    .scripts(["resources/js/FakeStore/fakeStore.js"], "public/js/fakeStore.js")
    .react()
    .sass("resources/sass/app.scss", "public/css")
    .sourceMaps(false, "inline-source-map")
    .disableNotifications()
    .options({
        runtimeChunkPath: 'js'
    })
    .webpackConfig({
        module: {
          rules: [
            {
              test: /\.tsx?$/,
              loader: "ts-loader",
              exclude: /node_modules/
            }
          ]
        },
        resolve: {
          extensions: ["*", ".js", ".jsx", ".vue", ".ts", ".tsx"]
        }
    });
