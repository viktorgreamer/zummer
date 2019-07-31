<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class PageAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',

        'css/style-page.css',
     //   'css/style-admin.css',
    ];

    public $js = [
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        //  'yii\bootstrap\BootstrapAsset',
    ];
}
