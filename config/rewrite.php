<?php
return array(
    // backend #############################################################################
    'admin-login' => 'user/admin-login',

    'admin/index' => 'admin/contact',

    'admin/<controller:\w+>/<id:\d+>' => 'admin/<controller>/view',
    'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
    'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',

    // frontend ############################################################################

    'success' => 'site/success',

    'page/<slug:\S+>' => 'page/view',
    
    'services' => 'service/index',
    'service/<slug:\S+>' => 'service/view',
    'photos' => 'photo/index',
    'photos/<slug:\S+>' => 'photo/view',
    'posts' => 'post/index',
    'post/<slug:\S+>' => 'post/view',
    'actions' => 'action/index',
    'action/<slug:\S+>' => 'action/view',

    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>/*' => '<controller>/<action>',
);