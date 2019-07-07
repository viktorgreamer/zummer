<?php

use common\models\Programs;
use common\models\Reviews;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReviewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-search">
    <div class="row">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1
            ],
        ]); ?>
        <div class="col-lg-1">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-lg-4">
            <?php

            // The controller action that will render the list
            $url = \yii\helpers\Url::to(['programs/list']);

            // The widget
            use kartik\select2\Select2; // or kartik\select2\Select2
            use yii\web\JsExpression;

            // Get the initial city description
            $cityDesc = empty($model->program_id) ? '' : Programs::findOne($model->program_id)->name;

            echo $form->field($model, 'program_id')->widget(Select2::classname(), [
                'initValueText' => $cityDesc, // set the initial display text
                'options' => ['placeholder' => 'Search for a city ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $url,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(city) { return city.text; }'),
                    'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                ],
            ]);
            ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'query') ?>

        </div>
        <div class="col-lg-1">
            <?php echo $form->field($model, 'status')->dropDownList([null => ''] + Reviews::mapStatuses()) ?>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

    </div>


    <?php // echo $form->field($model, 'common') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'using_time') ?>

    <?php // echo $form->field($model, 'rating_convenience') ?>

    <?php // echo $form->field($model, 'rating_functions') ?>

    <?php // echo $form->field($model, 'rating_support') ?>

    <?php // echo $form->field($model, 'created_at') ?>


</div>
