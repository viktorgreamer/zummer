<?php

use common\models\Developers;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DevelopersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Developers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="developers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Developers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'table-layout:fixed;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'site',
            'logo:image',
            // 'description',
            'country',
            'foundation_year',
            //'user_id',
            //'address1',
            //'address2',
            //'phone',
            //'postcode',
            //'office_country',
            //'email:email',
            //'city',
            // 'logo',
            ['attribute' => 'billing','format'  =>'html', 'value' => function (Developers $model) {
                return Html::a($model->billing?: 'Пополнить', Url::to(['developers/put-money', 'id' => $model->id]));
            }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
