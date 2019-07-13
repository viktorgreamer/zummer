<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Developers */

$this->title = 'Create Developers';
$this->params['breadcrumbs'][] = ['label' => 'Developers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="developers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
