<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DevelopersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Developers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="developers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_list_view',
    ]) ?>


</div>
