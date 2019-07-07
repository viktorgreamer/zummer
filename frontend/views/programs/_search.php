<?php

use common\models\Categories;
use common\models\Developers;
use common\models\Functions;
use common\models\Platforms;
use common\models\Programs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programs-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-lg-1">
            <?= $form->field($model, 'query') ?>
        </div>
        <div class="col-lg-2">
            <?php echo $form->field($model, 'category_id')->dropDownList([null => ''] + Categories::map()) ?>
        </div>
        <div class="col-lg-2">
            <?php echo $form->field($model, 'price_from')->textInput() ?>
        </div>
        <div class="col-lg-2">
            <?php echo $form->field($model, 'price_to')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'platforms')->checkboxList(Platforms::map()) ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'functions')->checkboxList(Functions::map()) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
