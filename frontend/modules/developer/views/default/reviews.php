<?php

/** @var \common\models\Developers $model */

use yii\helpers\Url;

$this->title = 'Отзывы';
?>

    <div class="content container">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                                href="<?= Url::to(['/developer']); ?>">Личный кабинет</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Отзывы</li>
                </ol>
            </nav>
        </div>
        <div class="main">
            <div class="main">
                <?= $this->render('../layouts/admin_nav'); ?>
            </div>
            <div class="option reviews_product">
                <?php
                if ($model->reviews) {
                /** @var \common\models\Reviews $review */
                foreach ($model->reviews as $review) { ?>
                    <div class="rev_bl" data-rating="<?= $review->common(); ?>" data-date="<?= $review->created_at; ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="general_rating">
                                    <p class="titl">Общий рейтинг</p>
                                    <div class="rating_num"><?= $review->common(); ?></div>
                                    <div class="rating">
                                        <div class="stars">
                                            <?= $review->renderStars($review->rating_common); ?>
                                        </div>
                                    </div>

                                    <ul>
                                        <li>
                                            <p>Удобство</p>
                                            <div class="rating">
                                                <div class="stars">
                                                    <?= $review->renderStars($review->rating_convenience); ?>
                                                </div>
                                                <div class="num"><?= $review->rating_convenience; ?></div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Служба поддержки</p>
                                            <div class="rating">
                                                <div class="stars">
                                                    <?= $review->renderStars($review->rating_support); ?>
                                                </div>
                                                <div class="num"><?= $review->rating_support; ?></div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Функционал</p>
                                            <div class="rating">
                                                <div class="stars">
                                                    <?= $review->renderStars($review->rating_functions); ?>
                                                </div>
                                                <div class="num"><?= $review->rating_functions; ?></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8 rev_info">
                                <div class="img">
                            <span class="vk"><img alt="" src="http://test2.raketa.top/img/ico-rev_vk.png"
                                                  style="opacity: 1;"></span>
                                    <img alt="" src="<?= $review->user->getImage(); ?>" style="opacity: 1;">
                                </div>
                                <div class="text">
                                    <p class="comment"><?= $review->title; ?></p>
                                    <p class="date"><?= Yii::$app->formatter->asDate($review->created_at); ?></p>
                                    <div class="line name">
                                        <p><b><?= $review->user->fullName(); ?></b></p>
                                        <p><?= $review->user->getPosition(); ?><br>
                                            Использует продукт: более <?php echo $review->using_time; ?> года</p>
                                    </div>
                                    <div class="line">
                                        <p><b>Плюсы:</b></p>
                                        <p><?= $review->pluses; ?></p>
                                    </div>
                                    <div class="line">
                                        <p><b>Минусы:</b></p>
                                        <p><?= $review->minuses; ?></p>
                                    </div>
                                    <div class="line">
                                        <p><b>В целом:</b></p>
                                        <p><?= $review->common; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <? } else echo " У вас еще нет отзывов"; ?>

        </div>
    </div>

<?php



