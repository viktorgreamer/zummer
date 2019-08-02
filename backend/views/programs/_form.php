<?php

use common\models\Programs;
use common\models\Tariffs;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'main_page_order')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'main_page_position')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'relevance')->textInput(['maxlength' => true]) ?>
    <div class="col-lg-6">
        <?= $form->field($model, 'tariff_id')->dropDownList(Tariffs::map()) ?>
        <?= $form->field($model, 'tariff_type')->dropDownList(Tariffs::mapGroups()) ?>
        <?= $form->field($model, 'dueDate')->widget(DatePicker::className(),[
            'options' => ['placeholder' => 'Select issue date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
