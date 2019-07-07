<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContentCategories */

$this->title = 'Create Content Categories';
$this->params['breadcrumbs'][] = ['label' => 'Content Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
