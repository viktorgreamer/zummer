<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PutMoneyFrom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="developers-search">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'developer_id') ?>

    <?= $form->field($model, 'amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Пополнить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
