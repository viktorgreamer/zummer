<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContentThemes */

$this->title = 'Create Content Themes';
$this->params['breadcrumbs'][] = ['label' => 'Content Themes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-themes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
