<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => '北京同创共享网络科技有限公司',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'dbront' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mmDBSeller;dbname=mmfront',
            'username' => 'moumou',
            'password' => '9Af9TFYheBjfBT3Q',
            'tablePrefix'=>'mm_',
            'charset' => 'utf8',
        ],
        'dbvote' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mmDBSeller;dbname=mmvote',
            'username' => 'moumou',
            'password' => '9Af9TFYheBjfBT3Q',
            'tablePrefix'=>'mm_',
            'charset' => 'utf8',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'sdjapp.html'=>'site/sdj-app',
                'sellerapp.html'=>'site/seller-app',
                'job.html'=>'site/job',
                'index.html'=>'site/index',
                'm/sdjapp.html'=>'site-wap/sdj-app',
                'm/sellerapp.html'=>'site-wap/seller-app',
                'm/job.html'=>'site-wap/job',
                'm/index.html'=>'site-wap/index',
                'm/edu-share'=>'site-wap/edu-share',
                'm/?'=>'site-wap/index',
            ],
        ],
        
    ],
    'params' => $params,
];
