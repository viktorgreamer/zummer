<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Zummer!</h1>

        <p class="lead">Категорий <?= \common\models\Categories::find()->count(); ?></p>
        <p class="lead">Программ <?= \common\models\Programs::find()->count(); ?></p>
        <p class="lead">Отзывов <?= \common\models\Reviews::find()->where(['status' => 1])->count(); ?></p>
    </div>

    <div class="body-content">
        <?php
        if ($news = \common\models\ContentNews::findLast()) { ?>
        <h3>Новости</h3>
        <div class="row">
            <?php foreach ($news as $new) {
            /* @var $new \common\models\ContentNews */
                ?>
                <div class="col-lg-4">
                    <h2><?= $new->name; ?></h2>

                    <?= mb_strimwidth($new->body, 0, 400, '...'); ?>
                    <?= \yii\helpers\Html::a('More...',['news/view','id' => $new->id]);  ?>
                    <p></div>
            <?  } ?>
            

        </div>
        <?php   } ?>
    </div>
<div class="body-content">
        <?php
        if ($articles = \common\models\ContentArticles::findLast()) { ?>
        <h3>Статьи</h3>
        <div class="row">
            <?php foreach ($articles as $article) {
            /* @var $article \common\models\ContentArticles */
                ?>
                <div class="col-lg-4">
                    <h2><?= $article->name; ?></h2>

                    <?= mb_strimwidth($article->body, 0, 400, '...'); ?>
                    <?= \yii\helpers\Html::a('More...',['articles/view','id' => $article->id]);  ?>
                    <p></div>
            <?  } ?>
            

        </div>
        <?php   } ?>
    </div>


    <div class="subscriptions-form">
        <h3>Подписаться на рассылку</h3>
        <div class="row">

            <?php $form = ActiveForm::begin(['action' => 'subscriptions/create']);
            $model = new \common\models\Subscriptions();
            ?>
            <div class="col-lg-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            </div>

            <div class="col-lg-2">
                <?= $form->field($model, 'is_news')->checkbox() ?>

            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'is_articles')->checkbox() ?>

            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <?= Html::submitButton('Подписаться', ['class' => 'btn btn-success']) ?>
                </div>

            </div>
        </div>


        <?php ActiveForm::end(); ?>

    </div>
</div>
