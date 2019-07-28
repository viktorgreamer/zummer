<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContentThemes */

$this->title = 'Update Content Themes: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Content Themes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-themes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
