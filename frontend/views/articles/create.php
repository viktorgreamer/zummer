<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContentArticles */

$this->title = 'Create Content Articles';
$this->params['breadcrumbs'][] = ['label' => 'Content Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
