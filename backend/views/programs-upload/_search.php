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
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-lg-1">
            <?= $form->field($model, 'query') ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'status')->dropDownList(Programs::mapStatuses()) ?>
            <?php echo $form->field($model, 'main_page_order')->dropDownList([0,1,2,3,4,5,6]) ?>
            <?php echo $form->field($model, 'main_page_position')->dropDownList([0,1,2,3,4,5,6,7,8,9,10,11,12]) ?>
        </div>

        <div class="col-lg-2">
            <?php echo $form->field($model, 'developer_id')->dropDownList([null => ''] + Developers::map()) ?>
            <?php echo $form->field($model, 'category_id')->dropDownList([null => ''] + Categories::map()) ?>
        </div>
        <div class="col-lg-3">
            <?php echo $form->field($model, 'price_from')->textInput() ?>
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
