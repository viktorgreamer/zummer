<?php

use common\models\Programs;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [ 'style' => 'table-layout:fixed;' ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Параметры',
                'format' => 'html',
                'value' => function(Programs $model){
                    $options = [];
                    $options[] = "<h3>".$model->name."</h3>";
                    $options[] = "Общий рейтинг:".$model->rating;
                    $options[] = "Удобство:".$model->rating_convenience;
                    $options[] = "Функции:".$model->rating_functions;
                    $options[] = "Поддержка:".$model->rating_support;
                    if ($model->platforms) {
                        $options[] = "<h5>Платформы:</h5>";
                        foreach ($model->platforms as $platform) {
                            $options[] = Html::tag('span',$platform->name,['class' => 'label label-primary']);
                        }
                    }
                    return implode("<hr style='padding: 1px; margin: 1px'>", $options);
                }
            ],
            [
                'label' => 'Функции',
                'format' => 'html',
                'value' => function(Programs $model){
                    $options = [];
                    if ($model->functions) {
                        $options[] = "<h5>Функции:</h5>";
                        foreach ($model->functions as $function) {
                            $options[] = Html::tag('span',$function->name,['class' => 'label label-success']);
                        }
                    }
                    return implode("<hr style='padding: 1px; margin: 1px'>", $options);
                }
            ],



            [
                'label' => 'Ссылки',
                'format' => 'html',
                'value' => function(Programs $model){
                    $options = [];
                   if ($model->link) $options[] = Html::a('Caйт', $model->link);
                   if ($model->video_link) $options[] = Html::a('Видео', $model->video_link);
                   if ($model->trial_link) $options[] = Html::a('Пробный период', $model->trial_link);
                    return implode("<hr style='padding: 1px; margin: 1px'>", $options);
                }
            ],


            'destination:ntext',
            'description:ntext',
            'category.name',

            [
                'label' => 'Отзывы',
                'value' => function(Programs $model){
                    return count($model->reviews);
                }
            ],

            [
                'label' => 'Цены',
                'value' => function(Programs $model){
                    $options = [];
                   if ($model->price_from) $options[] = "От ".$model->price_from;
                   if ($model->price_to) $options[] = " до ".$model->price_to;

                    return implode("", $options);
                }
            ],

        ],
    ]); ?>


</div>
