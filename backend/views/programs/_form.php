<?php

use common\models\Programs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destination')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'developer_id')->textInput() ?>

    <?= $form->field($model, 'support_map')->checkboxList(Programs::mapSupport()) ?>

    <?= $form->field($model, 'learning_map')->checkboxList(Programs::mapLearning()) ?>

    <?= $form->field($model, 'price_from')->textInput() ?>

    <?= $form->field($model, 'price_to')->textInput() ?>

    <?= $form->field($model, 'prices')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'has_month_plan')->checkbox() ?>

    <?= $form->field($model, 'has_year_plan')->checkbox() ?>

    <?= $form->field($model, 'has_free')->checkbox() ?>

    <?= $form->field($model, 'has_trial')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
