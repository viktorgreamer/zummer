<?php

namespace app\modules\developer\controllers;

use yii\web\Controller;

/**
 * Default controller for the `developer` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
       \Yii::error($this->module->layoutPath);
       \Yii::error($this->module->layout);
        return $this->render('index');
    }

    public function actionEditProfile()
    {
        return $this->render('index');
    }
}
