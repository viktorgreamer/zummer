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

    <?= Html::a('Create', ['create'], ['class' => 'btn btn-primary']) ?>

    <h1><?= Html::encode($this->title) ?></h1>
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

            //'rating',
            //'rating_convenience',
            //'rating_functions',
            //'rating_support',
            //'status',
            //'created_at',
            //'updated_at',
            //'developer_id',
            //'support:ntext',
            //'learning:ntext',
          //  'price_from',
           // 'price_to',
            //'prices:ntext',
            //'has_month_plan',
            //'has_year_plan',
            //'has_free',
            //'has_trial',
            //'trial_link:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
