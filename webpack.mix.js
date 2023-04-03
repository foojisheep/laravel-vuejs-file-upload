const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public.js').setPublicPath('dist');
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css',[
        require('postcss-import'),
        require('tailwindscss'),
        require('autoprefixer'),
    ]);

mix.copy('node_modules/bootstrap/dist/fonts', 'public/fonts');
mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css.map', 'public/css');
