<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryIndustries */

$this->title = 'Create Category Industries';
$this->params['breadcrumbs'][] = ['label' => 'Category Industries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-industries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
