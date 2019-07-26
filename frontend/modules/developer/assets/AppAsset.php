<?php

namespace frontend\modules\developer\assets;

/**
 * Main frontend application asset bundle.
 */

class AppAsset extends \frontend\assets\AppAsset
{
    public static $bodyClasses = [

    ];

    public static function bodyClass()
    {
        if (isset(self::$bodyClasses[\Yii::$app->controller->route])) {
            return '';
        } else {

            return 'admin';
        }

    }

    public static $headers = [
        'developers' => '../modules/dev/layouts/header',
    ];

    const DEFAULT_HEADER_VIEW = 'header/main';

    public static function header()
    {
        if (isset(self::$headers[\Yii::$app->controller->route])) {
            \Yii::error(\Yii::$app->controller->route . " DEFINED");
            return self::$headers[\Yii::$app->controller->route];
        } else {
            \Yii::error(" NOT DEFINED");
            return self::DEFAULT_HEADER_VIEW;
        }
    }

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/style-all.css',
        'css/style-admin.css',
        'css/owl.carousel.min.css',
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css',
    ];

    public $js = [
        'https://code.jquery.com/jquery-3.4.1.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        'js/main_admin.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js',
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js'
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        //  'yii\bootstrap\BootstrapAsset',
    ];


}
