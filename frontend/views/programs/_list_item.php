<?php

/** @var common\models\Programs $model */

use common\models\Reviews;
use yii\helpers\Url; ?>

<div class="tab card_program" data-popularity="<?= $model->popularity;?>" data-rating="<?= $model->rating;?>" data-price_from="<?= $model->price_from;?>">
    <div class="row">
        <div class="col-md-3 col-xl-4 img d-md-flex flex-column">
            <a href="#" class=""><img alt="" src="<?= $model->getLogo(); ?>"></a>
            <div class="add ">
                <a href="#"><i>+</i> <b>сравнить</b> <span></span></a>
            </div>

        </div>
        <div class="col-md-9 col-xl-8 info">
            <div class="row tabs_info">
                <div class="col-md-4 name">
                    <p><a href=""><?= $model->name; ?></a></p>
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
                <p><?= $model->description; ?> <a href="btn">Узнайте больше о <?= $model->name; ?></a></p>
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
                        <span data-star="5"></span>
                        <span data-star="4"></span>
                        <span data-star="3"></span>
                        <span data-star="2"></span>
                        <span data-star="1"></span>
                    </div>
                </div>

                <p class="titl"><?= $review->user->username; ?></p>
                <p><?= mb_strimwidth($review->pluses,0,300, '...'); ?> <a href="<?= Url::to(['review','id' => $review->id]); ?>">Читать весь отзыв</a></p>
                <? } ?>
            </div>
        </div>
        <div class="col-md-3 col-xl-4 order-md-1 d-md-flex flex-column ">
            <div class="bt align-items-center">
                <a href="#" class="btn btn-green btn-more">демо-доступ</a>
            </div>
            <div class="bt align-items-center">
                <a href="#" class="btn bnt-price">открыть сайт</a>
            </div>
        </div>
    </div>
</div>

