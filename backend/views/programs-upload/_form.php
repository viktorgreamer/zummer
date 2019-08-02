<?php

use common\models\Categories;
use common\models\Developers;
use common\models\Programs;
use kartik\date\DatePicker;
use unclead\multipleinput\MultipleInput;
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
            <?= $form->field($model, 'developer_id')->dropDownList(Developers::map()) ?>
            <?= $form->field($model, 'destination_id')->dropDownList(Programs::mapDestinations()) ?>

        </div>

        <div class="col-lg-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'price_from')->textInput() ?>
            <?= $form->field($model, 'price_to')->textInput() ?>


        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'prices')->textInput() ?>
            <?= $form->field($model, 'hide_price')->checkbox() ?>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'destination')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'description_short')->textarea(['rows' => 6]) ?>

        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'support_map')->checkboxList(Programs::mapSupport()) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'learning_map')->checkboxList(Programs::mapLearning()) ?>

        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'demonstration_map')->checkboxList(Programs::mapDemonstrations()) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'users_count_map')->checkboxList(Programs::mapUsersCount()) ?>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'platforms')->checkboxList(\common\models\Platforms::map()) ?>

        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'functions')->checkboxList(\common\models\Functions::map()) ?>

        </div>

    </div>
    <hr>
    <div class="row">

        <div class="col-lg-4">
            <h4>Тарифные опции</h4>
            <?= $form->field($model, 'has_month_plan')->checkbox() ?>

            <?= $form->field($model, 'has_year_plan')->checkbox() ?>

            <?= $form->field($model, 'has_free')->checkbox() ?>

            <?= $form->field($model, 'has_trial')->checkbox() ?>

        </div>
        <div class="col-lg-4">
            <h4>Обучение и поддержка</h4>
            <?= $form->field($model, 'learning_free')->checkbox() ?>

            <?= $form->field($model, 'learning_paid')->checkbox() ?>

            <?= $form->field($model, 'support_free')->checkbox() ?>

            <?= $form->field($model, 'support_paid')->checkbox() ?>

        </div>

        <div class="col-lg-4">
        <?= $form->field($model, 'tags')->widget(MultipleInput::className(), [
            'min' => 4,
            'max' => 4,
            'columns' => [
                [
                    'name' => 'name',
                    'title' => 'Название',
                ],
                [
                    'name' => 'link',
                    'title' => 'Ссылка'
                ],

            ]
        ]); ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <h4>загрузка фотографий</h4>
        <div class="col-lg-4">
            <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'imageUpload')->fileInput() ?>
        </div> <div class="col-lg-4">
            <?= $form->field($model, 'imageAwardsFiles[]')->fileInput(['multiple' => true]) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <h4>Тарифная информация</h4>
            <?= $form->field($model, 'main_page_order')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'main_page_position')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'relevance')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tariff')->textInput() ?>
            <?= $form->field($model, 'dueDate')->widget(DatePicker::className(),[
                'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]) ?>
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
<?php
