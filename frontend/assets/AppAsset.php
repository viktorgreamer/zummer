<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public static $bodyClasses = [
        'site/index' => 'home',
        'programs/index' => 'katalog',
        'programs/view' => 'product free_product',
        'programs/compare' => 'compare',
        'categories/index' => 'categories',
        'news/index' => 'news',
        'site/developers' => 'developers',
        'developer/default/index' => 'admin',
    ];

    public static function bodyClass()
    {
        return self::$bodyClasses[\Yii::$app->controller->route];
    }

    public static $headers = [
        'categories/index' => 'header/categories',
        'developers' => '../modules/dev/layouts/header',
    ];

    const DEFAULT_HEADER_VIEW = 'header/main';

    public static function header()
    {
        if (isset(self::$headers[\Yii::$app->controller->route])) {
            \Yii::error(\Yii::$app->controller->route." DEFINED");
            return  self::$headers[\Yii::$app->controller->route];
        }
        else {
            \Yii::error(" NOT DEFINED");
            return self::DEFAULT_HEADER_VIEW;
        }
    }

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/style-all.css',
        'css/style-main.css',
        'css/style-page.css',
        'css/style-admin.css',
        'css/owl.carousel.min.css',
        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css',
    ];

    public $js = [
        'https://code.jquery.com/jquery-3.4.1.min.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        'js/main.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js',
        'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js'
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        //  'yii\bootstrap\BootstrapAsset',
    ];
}
