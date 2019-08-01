<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 26.05.2019
 * Time: 10:32
 */


namespace console\controllers;

use common\models\Programs;
use yii\console\Controller;

class CronController extends Controller
{
    public function actionResetBilling() {
        if ($programs = Programs::find()->where(['>','tariff',0])
            ->andWhere(['dueDate' => date('Y-m-d')])
            ->all()) {
            foreach ($programs as $program) {
                print_r($program->toArray());
                $program->tariff = 0;
                $program->save();
                print_r($program->toArray());
            }
        }
    }

}