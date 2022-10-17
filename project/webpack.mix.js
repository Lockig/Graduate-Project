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

mix.styles('resources/assets/css/pages/login/login-3.css', 'public/css/auth/auth.css').version();

//js file
mix.scripts([
    "resources/assets/plugins/global/plugins.bundle.js",
    "resources/assets/plugins/custom/prismjs/prismjs.bundle.js",
    "resources/assets/js/scripts.bundle.js",
    "resources/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"
],'public/js/app.js').version();

//js file
mix.scripts([
    "resources/assets/plugins/global/plugins.bundle.js",
    "resources/assets/plugins/custom/prismjs/prismjs.bundle.js",
    "resources/assets/js/scripts.bundle.js"
],'public/js/auth.js').version();

mix.scripts([
    "resources/assets/js/scripts.bundle.js"
],'public/js/scripts.js').version();

mix.scripts([
    "resources/assets/js/pages/features/calendar/external-events.js"
],'public/js/external-events.js')

mix.scripts('resources/assets/js/pages/custom/user/add-user.js', 'public/js/user/user.js');
mix.scripts('resources/assets/js/pages/widgets.js','public/js/widget.js');
mix.scripts([
    // 'resources/assets/js/pages/custom/profile/profile.js',
    'resources/assets/js/pages/crud/ktdatatable/base/html-table.js',
], 'public/js/user/table.js').version();

//js user profile
'resources/assets/js/pages/crud/ktdatatable/base/html-table.js',
mix.scripts('resources/assets/js/pages/crud/ktdatatable/base/html-table.js','public/js/list-user.js').version();
mix.scripts('resources/assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js','public/js/datetimepicker.js').version()
mix.scripts('resources/assets/js/pages/custom/profile/profile.js','public/js/user/profile.js').version();
mix.scripts('resources/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js','public/js/user/date-picker.js').version();
mix.scripts('resources/assets/js/pages/crud/file-upload/image-input.js','public/js/user/image-input.js','public/js/image-input.js').version();
mix.scripts('resources/assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js','public/js/timepicker.js').version();
