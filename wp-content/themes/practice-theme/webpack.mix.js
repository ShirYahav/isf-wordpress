let mix = require('laravel-mix');
mix
  .setPublicPath('dist')
  .js('resources/js/app.js', 'js')
  .sass('resources/scss/style.scss', 'css')
  .options({ processCssUrls: false })
  .copyDirectory('resources/fonts', 'dist/fonts')
  .copyDirectory('resources/images', 'dist/images')
  .version()
  .sourceMaps();