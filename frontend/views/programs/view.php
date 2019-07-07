<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
            'link'
        ],
    ]) ?>

    <?php
    if ($model->reviews) {
        /* @var $review  \common\models\Reviews */ ?>
        <h3>Отзывы: </h3>
        <hr>
        <?php foreach ($model->reviews as $review) { ?>


            <h4><?= $review->user->username; ?></h4>
            <h4> Пользуется: <?= $review->user->username; ?></h4>
            <?php
            $options[] = "Удобство: " . $review->rating_convenience;
            $options[] = "Функции: " . $review->rating_functions;
            $options[] = "Поддержка: " . $review->rating_support;

            if ($options) echo implode("<br>", $options);
            ?>
            <div>
                <h4><?= $review->title; ?></h4>

                +
                <p><?= $review->pluses ?></p>
                -
                <p><?= $review->minuses ?></p>
                В общем
                <p><?= $review->common ?></p>

            </div>
            <hr>
        <?php } ?>

    <?php } ?>


    <div id="review-form">

        <?php $form = ActiveForm::begin(['action' => '/reviews/create']); ?>
        <?php
        $review = new \common\models\Reviews();
        $review->program_id = $model->id;
        $review->user_id = Yii::$app->user->id;
        ?>
        <?= $form->field($review, 'program_id')->hiddenInput()->label(false); ?>
        <?= $form->field($review, 'user_id')->hiddenInput()->label(false); ?>
        <?= $form->field($review, 'using_time') ?>
        <?= $form->field($review, 'title') ?>
        <?= $form->field($review, 'pluses') ?>
        <?= $form->field($review, 'minuses') ?>
        <?= $form->field($review, 'common') ?>
        Удобство:

        <input name="rating_convenience" style="display: none" v-model="currentRatingConvenience">
        <div class="inline">
            <i v-for="rating in ratings" :class="getClass(rating,'currentRatingConvenience')"
               @click="setRating(rating, 'currentRatingConvenience')" aria-hidden="true" style="color: yellow"></i>
        </div>
        Функции:
        <input name="rating_functions" style="display: none" v-model="currentRatingFunctions">
        <div class="inline">
            <i v-for="rating in ratings" :class="getClass(rating,'currentRatingFunctions')"
               @click="setRating(rating, 'currentRatingFunctions')" aria-hidden="true" style="color: yellow"></i>
        </div>
        Поддержка:
        <input name="rating_support" style="display: none" v-model="currentRatingSupport">
        <div class="inline">
            <i v-for="rating in ratings" :class="getClass(rating,'currentRatingSupport')"
               @click="setRating(rating, 'currentRatingSupport')" aria-hidden="true" style="color: yellow"> </i>
        </div>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

        <script>


        </script>
    </div>


</div>
