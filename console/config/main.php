<?php
$params = array_merge(
    require __DIR__ . '/params.php',
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;dbname=test_yii_db',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            ],
    ],
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'params' => $params,
];
