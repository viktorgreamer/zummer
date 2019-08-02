<?php

use yii\helpers\Html;
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
            'video_link:ntext',
            'destination:ntext',
            'description:ntext',
            'rating',
            'rating_convenience',
            'rating_functions',
            'rating_support',
            'status',
            'created_at',
            'updated_at',
            'developer_id',
            'support:ntext',
            'learning:ntext',
            'price_from',
            'price_to',
            'prices:ntext',
            'has_month_plan',
            'has_year_plan',
            'has_free',
            'has_trial',
            'trial_link:ntext',
            'category_id',
            'logo',
            'views',
            'popularity',
            'tariff',
            'dueDate',
            'prices_link',
            'destination_id',
            'price_plan',
            'support_free',
            'support_paid',
            'learning_paid',
            'learning_free',
            'demonstration',
            'description_short:ntext',
            'hide_price',
            'users_count',
            'price_per_users',
            'phone',
            'relevance',
            'main_page_order',
            'main_page_position',
        ],
    ]) ?>

</div>
