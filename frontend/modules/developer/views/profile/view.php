<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Developers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Developers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="developers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('UpdateAwards', ['update-awards'], [
            'class' => 'btn btn-primary',
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'name',
            'site',
            'description:ntext',
            'country',
            'foundation_year',
        ],
    ]) ?>


    <?php
    if ($model->awards) { ?>
    <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3">

        <?php
        /* @var $award \common\models\DevelopersAwardsImages */
        foreach ($model->awards as $award) { ?>

            <div class="thumbnail">
                <img src="<?= $award->src; ?>" alt="<?= $award->description; ?>">
                <p>
                    <?= $award->description; ?>
                </p>
            </div>
            <?= Html::a("Delete", Url::to(['delete-awards','developer_id' => $award->developer_id,'priority' => $award->priority]),['class' => 'btn btn-danger']); ?>
        <?php } ?>


        </div>

    </div>
            <?php

    }
    ?>




</div>
