<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContentImages */

$this->title = 'Update Content Images: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Content Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-images-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
