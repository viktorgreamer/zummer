<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContentArticles */

$this->title = 'Update Content Articles: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Content Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-articles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
