const mix = require('laravel-mix')

mix.js("resources/js/app.js", "dist")
    .ts('ts/index.ts', 'dist/appui.js')
    .setPublicPath('dist')
    .postCss('resources/css/appui.css', 'dist', [require('tailwindcss')])

if (mix.inProduction()) {
  mix.version()
}

mix.disableSuccessNotifications()
