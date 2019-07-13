<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="programs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'link',
            'video_link',
            'destination:ntext',
            'description:ntext',
            'rating',
            'rating_convenience',
            'rating_functions',
            'rating_support',
            'status',
        ],
    ]) ?>

    <?php
    if ($model->images) { ?>
        <div class="row">

            <?php
            /* @var $image \common\models\ProgramsImages */
            foreach ($model->images as $key => $image) { ?>
                <div class="col-xs-6 col-md-3 col-lg-3">

                    <?= $image->priority; ?>
                    <?= Html::a("Delete", Url::to(['delete-images', 'program_id' => $image->program_id, 'priority' => $image->priority]), ['class' => 'btn btn-danger']); ?>
                    <? if ($key !== 0) echo Html::a("Priority up", Url::to(['change-images-priority', 'program_id' => $image->program_id, 'id' => $image->id, 'direction' => 'up']), ['class' => 'btn btn-primary']); ?>
                    <? if ($key !== (count($model->images) - 1)) echo Html::a("Priority down", Url::to(['change-images-priority', 'program_id' => $image->program_id, 'id' => $image->id, 'direction' => 'down']), ['class' => 'btn btn-primary']); ?>

                    <div class="thumbnail">
                        <img src="<?= $image->src; ?>" alt="<?= $model->description; ?>">

                    </div>

                </div>
            <?php } ?>


        </div>
        <?php

    }
    ?>


</div>
