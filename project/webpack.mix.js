const mix = require('laravel-mix');

//media file
mix.copyDirectory('resources/assets/media', 'public/media');
mix.copyDirectory('resources/assets/plugins', 'public/plugins');
mix.copyDirectory('resources/assets/plugins/global/fonts', 'public/css/fonts');


//css file
mix.styles([
    "resources/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css",
    "resources/assets/plugins/global/plugins.bundle.css" ,
    "resources/assets/plugins/custom/prismjs/prismjs.bundle.css" ,
    "resources/assets/css/style.bundle.css" ,
    "resources/assets/css/themes/layout/header/base/light.css" ,
    "resources/assets/css/themes/layout/header/menu/light.css" ,
    "resources/assets/css/themes/layout/brand/dark.css" ,
    "resources/assets/css/themes/layout/aside/dark.css",

],'public/css/app.css').version();


//js file
mix.scripts([
    "resources/assets/plugins/global/plugins.bundle.js",
    "resources/assets/plugins/custom/prismjs/prismjs.bundle.js",
    "resources/assets/js/scripts.bundle.js",
    "resources/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js",
    "resources/assets/plugins/custom/gmaps/gmaps.js",
    "resources/assets/js/pages/widgets.js",
],'public/js/app.js').version();

