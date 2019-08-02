<?php

use common\models\Developers;
use common\models\PaymentRequests;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentRequests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-requests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'developer_id')->dropDownList(Developers::map()) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(PaymentRequests::mapStatuses()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
