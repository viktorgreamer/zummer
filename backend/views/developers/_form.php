<?php

use common\models\Developers;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Developers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="developers-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'foundation_year')->textInput() ?>


        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'address1')->textInput(['maxlength' => true]) ?>


        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'address2')->textInput(['maxlength' => true]) ?>


        </div>


        <div class="col-lg-3">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'office_country')->dropDownList(Developers::countries()) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'imageUpload')->fileInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'create_user')->checkbox() ?>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
