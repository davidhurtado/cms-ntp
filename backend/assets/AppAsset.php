<?php

namespace backend\assets;

use yii\web\AssetBundle;
/**
 * Main backend application asset bundle.
 */
 
class AppAsset extends AssetBundle {

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    
    public $sourcePath = '@bower/backend/';
    public $css = [
        //'css/site.css',
        'bootstrap/css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'plugins/iCheck/flat/blue.css',
        'plugins/morris/morris.css',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'plugins/datepicker/datepicker3.css',
        'plugins/daterangepicker/daterangepicker-bs3.css',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ];
    public $js = [
       
        'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        'plugins/morris/morris.min.js',
//<!-- Sparkline -->
        'plugins/sparkline/jquery.sparkline.min.js',
//<!-- jvectormap -->
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
////<!-- jQuery Knob Chart -->
        'plugins/knob/jquery.knob.js',
////<!-- daterangepicker -->
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
        'plugins/daterangepicker/daterangepicker.js',
////<!-- datepicker -->
        'plugins/datepicker/bootstrap-datepicker.js',
////<!-- Bootstrap WYSIHTML5 -->
  //      'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
////<!-- Slimscroll -->
        'plugins/slimScroll/jquery.slimscroll.min.js',
////<!-- FastClick -->
        'plugins/fastclick/fastclick.js',
////<!-- AdminLTE App -->
      //  'dist/js/app.min.js',
////<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  //    'dist/js/pages/dashboard.js',
////<!-- AdminLTE for demo purposes -->
        'dist/js/demo.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
        'dmstr\web\AdminLteAsset',
    ];

}
