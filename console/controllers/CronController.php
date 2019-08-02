<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 26.05.2019
 * Time: 10:32
 */


namespace console\controllers;

use common\models\Programs;
use common\models\Tariffs;
use yii\console\Controller;

class CronController extends Controller
{
    public function actionResetBilling()
    {
        if ($programs = Programs::find()->where(['>', 'tariff_id', 0])
            ->andWhere(['dueDate' => date('Y-m-d')])
            ->all()) {
            /** @var Programs $program */
            foreach ($programs as $program) {

                if ($program->auto_prolongation && $tariff = Tariffs::findOne($program->tariff_id)) {
                    if ($program->developer) {
                        if ($program->developer->billing >= $tariff->rate) {
                            $program->prolongate();
                            $program->save();
                        }
                    }
                } else {
                    print_r($program->toArray());
                    $program->tariff_id = 0;
                    $program->save();
                    print_r($program->toArray());
                }

            }
        }
    }

}