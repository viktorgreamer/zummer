<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentRequests */

$this->title = 'Create Payment Requests';
$this->params['breadcrumbs'][] = ['label' => 'Payment Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-requests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
