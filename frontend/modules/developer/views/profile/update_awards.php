<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Developers */

$this->title = 'Update Awards: ';
$this->params['breadcrumbs'][] = ['label' => 'Developers', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="developers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_awards', [
        'model' => $model,
    ]) ?>

</div>
