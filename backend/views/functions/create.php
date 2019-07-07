<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Functions */

$this->title = 'Create Functions';
$this->params['breadcrumbs'][] = ['label' => 'Functions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="functions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
