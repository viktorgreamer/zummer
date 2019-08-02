<?php

use common\models\PaymentRequests;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PaymentRequestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-requests-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Payment Requests', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
        if ($model->status == 2) return ['class' => 'success'];
        if ($model->status == 1) return ['class' => 'info'];
        if ($model->status == 4) return ['class' => 'danger'];
        if ($model->status == 3) return ['class' => 'warning'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'developer.name',
            'amount',
            'created_at:datetime',
            'paid_at:datetime',
            ['attribute' => 'status', 'value' => function ($model) {
                return PaymentRequests::mapStatuses()[$model->status];
            }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
