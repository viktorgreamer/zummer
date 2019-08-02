<?php

use common\models\Categories;
use common\models\ContentArticles;
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
        <?= $form->field($model, 'category_program_id')->dropDownList([null => ''] + Categories::map()) ?>
        <?= $form->field($model, 'is_advise')->dropDownList(ContentArticles::mapAdvises()) ?>
        <?= $form->field($model, 'do_not_show')->checkbox(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'themes')->checkboxList(\common\models\ContentThemes::map()) ?>

        <?= $form->field($model, 'image')->textInput() ?>


        <textarea name="body"><?php echo $model->body;?></textarea>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
$js = <<<JS

        CKEDITOR.replace( 'body' );
    
JS;

Yii::$app->view->registerJsFile('https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js');
Yii::$app->view->registerJs($js, 4);