<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'program_id',
            'title',
            'pluses:ntext',
            'minuses:ntext',
            'common:ntext',

            [
                'label' => 'Действия',
                'format' => 'raw',
                'value' => function ($model) {
                    $links[] = Html::a("Отклонить", ['apply', 'id' => $model->id], ['class' => 'btn btn-danger']);
                    $links[] = Html::a("Подтвердить", ['deny', 'id' => $model->id], ['class' => 'btn btn-success']);
                    return implode(" ", $links);
                },
            ],


            //'user_id',
            //'using_time:datetime',
            //'rating_convenience',
            //'rating_functions',
            //'rating_support',
            //'created_at',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
