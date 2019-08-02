<?php

use common\models\Tariffs;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tariffs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tariffs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tariffs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'category_id',
            ['attribute' => 'group_id','value' => function(Tariffs $model) {
        return Tariffs::mapGroups()[$model->group_id];
            }],
            'rate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
