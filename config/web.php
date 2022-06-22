<?php
$s = DIRECTORY_SEPARATOR;
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Сайт визитка',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'thumbnail'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@backend' => '@app/backend',
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\backend\AdminModule',
        ],
        'settings' => [
            'class' => 'yii2mod\settings\Module',
        ],
    ],
    'language' => 'ru-RU',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xabXDg7_yrIrbPr6FN3xi_HixUa75SQd',
            'baseUrl'=> '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => function () {
            return Yii::createObject([
                'class' => 'yii\swiftmailer\Mailer',
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => Yii::$app->settings->get('SiteSettings', 'smtpHost'),
                    'port' => Yii::$app->settings->get('SiteSettings', 'smtpPort'),
                    'username' => Yii::$app->settings->get('SiteSettings', 'smtpUsername'),
                    'password' => Yii::$app->settings->get('SiteSettings', 'smtpPassword'),
                    'encryption' => Yii::$app->settings->get('SiteSettings', 'smtpSecure'),
                ],
            ]);
        },
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    //'categories' => ['app\models\*', 'app\backend\*'],
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => file_exists(__DIR__ . $s . 'rewrite.php') ? require_once(__DIR__ . $s . 'rewrite.php') : [],

        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'yii2mod.settings' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/settings/messages',
                ],
            ],
        ],
        'thumbnail' => [
            'class' => 'himiklab\thumbnail\EasyThumbnail',
            'cacheAlias' => 'assets/thumbnails',
        ],
        'settings' => [
            'class' => 'yii2mod\settings\components\Settings',
        ],
        'formatter' => [
            'locale' => 'ru-RU',
            'dateFormat' => 'dd.MM.yyyy',
            'datetimeFormat' => 'dd.MM.yyyy HH:mm:ss',
            'booleanFormat' => ['Нет', 'Да'],
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
            'nullDisplay' => '&nbsp;',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
               'yii\bootstrap\BootstrapAsset' => [
                   'css' => [],
               ],
           ],
       ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
        'generators' => [ //here
            'crud' => [  
                'class' => 'yii\gii\generators\crud\Generator', // generator class
                'templates' => [  
                    'admin' => '@app/gii/admin', // template name => path to template
                ]
            ]
        ],
    ];
}

return $config;
