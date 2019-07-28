<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContentImages */

$this->title = 'Create Content Images';
$this->params['breadcrumbs'][] = ['label' => 'Content Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
