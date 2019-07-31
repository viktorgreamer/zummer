<?php

/** @var common\models\Programs $model */

use common\models\Reviews;
use yii\helpers\Url; ?>

<div class="tab card_program" data-popularity="<?= $model->popularity;?>" data-relevance="<?= $model->relevance;?>" data-rating="<?= $model->rating;?>" data-price_from="<?= $model->price_from;?>">
    <div class="row">
        <div class="col-md-3 col-xl-4 img d-md-flex flex-column">
            <a href="<?= Url::to(['catalog/view','id' => $model->id]);?>" class=""><img alt="" src="<?= $model->getLogo(); ?>"></a>
            <div class="add ">
                <a href="#" class="add-to-compare" data-id="<?= $model->id;?>"><i>+</i> <b>сравнить</b> <span></span></a>
            </div>

        </div>
        <div class="col-md-9 col-xl-8 info">
            <div class="row tabs_info">
                <div class="col-md-4 name">
                    <p><a href="<?= Url::to(['catalog/view','id' => $model->id]);?>"><?= $model->name; ?></a></p>
                </div>
                <div class="col-md-4 demo">
                    <p class="titl">демо-доступ</p>
                    <p><?= $model->getDemo('Бесплатно '); ?></p>
                </div>
                <div class="col-md-4 stars">
                    <p class="titl">рейтинг</p>
                    <p><img alt="" src="/img/star_active.png"> <?= $model->rating; ?> ( <a
                                href="#"><?= count($model->reviews); ?> отзывов</a> )
                    </p>
                </div>
            </div>
            <div class="text">
                <p><?= $model->description; ?> <a href="<?= Url::to(['catalog/view','id' => $model->id]);?>">Узнайте больше о <?= $model->name; ?></a></p>
            </div>
        </div>
    </div>

    <div class="row rev_button">
        <div class="col-md-9 col-xl-8 order-md-2">
            <div class="review">
                <div class="img"><span class="vk"><img alt="" src="/img/ico-rev_vk.png" style="opacity: 1;"></span>
                    <img alt="" src="/img/men-test.jpg" style="opacity: 1;">
                </div>
                <?php /** @var Reviews $review */
                if ($review = Reviews::mainOne($model->id)) { ?>
                <div class="rating">
                    <div class="stars">
                        <?= $review->renderStars();?>
                    </div>
                </div>

                <p class="titl"><?= $review->user->fullName(); ?></p>
                <p><?= mb_strimwidth($review->pluses,0,$model->isPayed()?300:150, '...'); ?> <a href="<?= Url::to(['review','id' => $review->id]); ?>">Читать весь отзыв</a></p>
                <? } ?>
            </div>
        </div>
        <div class="col-md-3 col-xl-4 order-md-1 d-md-flex flex-column ">

            <? if ($model->isPayed()) { ?>
            <div class="bt align-items-center">
                <a href="<?= $model->trial_link;?>" class="btn btn-green btn-more">демо-доступ</a>
            </div>
            <div class="bt align-items-center">
                <a href="<?= $model->link;?>" class="btn bnt-price">открыть сайт</a>
            </div>
            <? }  else  { ?>
                <div class="bt align-items-center">
                    <a href="<?= Url::to(['catalog/view','id' => $model->id]);?>" class="btn btn-green btn-more">подробнее <img alt="" src="/img/arr_white.png"></a>
                </div>
            <? }  ?>

        </div>
    </div>
</div>

