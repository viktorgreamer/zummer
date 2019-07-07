<?php
/* @var $model \common\models\Developers */
?>

<div class="jumbotron">
    <div class="container" style="background-color: whitesmoke">
        <h3><?= $model->name; ?></h3>
        <p><?= $model->description; ?></p>
        <p>Страна: <?= $model->country; ?></p>
        <p><?= " Программ: " . count($model->programs); ?></p>
    </div>
</div>
