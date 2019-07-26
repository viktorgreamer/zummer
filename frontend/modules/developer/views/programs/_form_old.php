<?php

use common\models\Categories;
use common\models\Programs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programs-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'category_id')->dropDownList(Categories::map()) ?>

        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'destination')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'support_map')->checkboxList(Programs::mapSupport()) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'learning_map')->checkboxList(Programs::mapLearning()) ?>

        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'platforms')->checkboxList(\common\models\Platforms::map()) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'functions')->checkboxList(\common\models\Functions::map()) ?>

        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'price_from')->textInput() ?>

        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'price_to')->textInput() ?>

        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'has_month_plan')->checkbox() ?>

            <?= $form->field($model, 'has_year_plan')->checkbox() ?>

            <?= $form->field($model, 'has_free')->checkbox() ?>

            <?= $form->field($model, 'has_trial')->checkbox() ?>

        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true]) ?>
        </div>
    </div>
    <? //  echo $form->field($model, 'prices')->textarea(['rows' => 6]) ?>

    <div class="col-lg-6">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
