<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf',
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced',
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
                'developers' => 'site/developers',
                'login' => 'developer/default/login',
                'developer/logout' => 'developer/default/logout',
                'developer/login' => 'developer/default/login',
                'developer/registration' => 'developer/default/registration',
            ],
        ],

        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => FALSE,
                'yii\bootstrap\BootstrapPluginAsset' => FALSE,
                'yii\web\JqueryAsset' => FALSE,
            ],
            'appendTimestamp' => TRUE,
        ],


    ],
    'modules' => [
        'developer' => [
            'class' => 'app\modules\developer\Module',

        ],
    ],
    'params' => $params,
];
