<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ContentImages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imageUpload')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
