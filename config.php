<?php
$host = getenv('MYSQL_HOST');
$dbname = getenv('MYSQL_DATABASE');
return [
    'id' => 'micro-app',
    // the basePath of the application will be the `micro-app` directory
    'basePath' => __DIR__,
    // this is where the application will find all controllers
    'controllerNamespace' => 'micro\controllers',
    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@micro' => __DIR__,
    ],
    'modules' => [
        'v1' => [
            'class' => 'micro\modules\v1\Module',
        ],
    ],
    'as access' => [
        'class' => 'micro\components\AccessControl',
        'allowActions' => [
            'site/*',
            'test/*',
            'v1/user/login',
            'v1/test/*',
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'micro\models\User',
            'enableAutoLogin' => false,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', 
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => "mysql:host={$host};dbname={$dbname}",
            'username' => getenv('MYSQL_USER'),
            'password' => getenv('MYSQL_PASSWORD'),
            'charset' => 'utf8',
        ],
        'request' => [
            'cookieValidationKey' => 'Fssdf12d2s31raararararf2asdaZTq4GhB2W2QZqyierWmHWmFwAK',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ],
        ],
        // gunakan dengan domain
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
        ],
        // 'errorHandler' => [
        //     'errorAction' => 'site/error',
        // ],

    ]

];
