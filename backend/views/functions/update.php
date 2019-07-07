<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Functions */

$this->title = 'Update Functions: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Functions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="functions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
