<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DevelopersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="developers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'site') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'foundation_year') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'verification_token') ?>

    <?php // echo $form->field($model, 'address1') ?>

    <?php // echo $form->field($model, 'address2') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'postcode') ?>

    <?php // echo $form->field($model, 'office_country') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'billing') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
