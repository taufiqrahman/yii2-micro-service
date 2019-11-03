<?php


require(__DIR__ . '/vendor/autoload.php');

// load .env
$env = __DIR__ ;

$dotenv = Dotenv\Dotenv::create($env);
$dotenv->load();

if (getenv('APP_ENV') !== 'production') {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}

define("API_HOST", getenv('API_HOST'));

require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

$config = require __DIR__ . '/config.php';
(new yii\web\Application($config))->run();
