<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 *     <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@bower/frontend/';
    public $css = [
        //'css/site.css',
       // 'css/bootstrap.min.css',
    'css/font-awesome.min.css',
    'css/prettyPhoto.css',
    'css/animate.css',
    'css/main.css', 
        ['images/ico/favicon.png','rel'=>'shortcut icon']


    ];
    public $js = [
        //'js/coloresCode.js',
        'js/jquery.js',
        'js/bootstrap.min.js',
        'js/jquery.prettyPhoto.js',
        'js/main.js'
    ];
    public $depends = [
        //'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
/*class AppAsset extends AssetBundle
{
    public $sourcePath = '@bower/';
    public $css = ['admin-lte/css/AdminLTE.css'];
    public $js = ['admin-lte/js/AdminLTE/app.js'];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}*/

