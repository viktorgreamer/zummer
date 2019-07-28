<?php

namespace app\modules\developer;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * developer module definition class
 */
class Module extends \yii\base\Module
{

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\developer\controllers';

    public $layoutPath = 'app\modules\developer\views\layouts';
    public $layout = 'main';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'registration','login'],
                'rules' => [
                    [
                        'actions' => ['registration'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
