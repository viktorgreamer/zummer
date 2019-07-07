<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use vova07\imperavi\Widget;


/* @var $this yii\web\View */
/* @var $model common\models\ContentArticles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(\common\models\ContentCategories::map()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(Widget::className(), [
        'settings' => [
            // 'lang' => 'ru',
            'minHeight' => 200,
            'imageUpload' => Url::to(['/admin/articles/image-upload']),

            'plugins' => [
                'clips',
                'fullscreen',
                'imagemanager',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
