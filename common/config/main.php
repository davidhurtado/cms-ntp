<?php

//$admin=Yii::$app->user->can('superadmin');

$varr = 'admin';
return [
    'timeZone' => 'America/Guayaquil',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        /*'request' => [
            'baseUrl' => 'http://localhost/advanced/frontend/web',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
        ],*/
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => [$varr],
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
            'adminPermission' => ['superadmin', 'admin'],
        ],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/path/to/uploadfolder',
            'uploadUrl' => '@web/path/to/uploadfolder',
            'imageAllowExtensions' => ['jpg', 'png', 'gif']
        ],
    ],
];
