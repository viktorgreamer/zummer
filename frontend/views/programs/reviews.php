<?php
/** @var \common\models\Programs $model */

use yii\helpers\Url; ?>

<div class="option reviews_product">
    <div  class="row rev_line">
        <div class="col-md-3 col-xl-2">
            <p class="titl_bl titl_opt"><img alt="" src="/img/rev_product.png"> <?= $model->name; ?>
                Отзывы</p>
        </div>
        <div class="col-md-3 col-xl-2">
            <div class="bt">
                <a class="btn btn-green" href="<?= Url::to(['reviews/create', 'id' => $model->id]); ?>">Написать
                    отзыв</a>
            </div>
        </div>
        <div class="col-md-6 col-xl-8">
            <div class="sort">
                <form>
                    Сортировать по:
                    <select id="reviews-sort-by">
                        <option value="date">по дате</option>
                        <option value="rating">по рейтингу</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <div id="review">
    <? /** @var \common\models\Reviews $review */
    foreach ($model->reviews as $review) { ?>
        <div class="rev_bl" data-rating="<?= $review->common(); ?>" data-date="<?= $review->created_at; ?>">
            <div class="row">
                <div class="col-md-4">
                    <div class="general_rating">
                        <p class="titl">Общий рейтинг</p>
                        <div class="rating_num"><?= $review->common(); ?></div>
                        <div class="rating">
                            <div class="stars">
                                <span data-star="5"></span>
                                <span data-star="4"></span>
                                <span data-star="3"></span>
                                <span data-star="2"></span>
                                <span data-star="1"></span>
                            </div>
                        </div>

                        <ul>
                            <li>
                                <p>Удобство</p>
                                <div class="rating">
                                    <div class="stars">
                                        <span data-star="5"></span>
                                        <span data-star="4"></span>
                                        <span data-star="3"></span>
                                        <span data-star="2"></span>
                                        <span data-star="1"></span>
                                    </div>
                                    <div class="num"><?= $review->rating_convenience; ?></div>
                                </div>
                            </li>
                            <li>
                                <p>Служба поддержки</p>
                                <div class="rating">
                                    <div class="stars">
                                        <span data-star="5"></span>
                                        <span data-star="4"></span>
                                        <span data-star="3"></span>
                                        <span data-star="2"></span>
                                        <span data-star="1"></span>
                                    </div>
                                    <div class="num"><?= $review->rating_support; ?></div>
                                </div>
                            </li>
                            <li>
                                <p>Функционал</p>
                                <div class="rating">
                                    <div class="stars">
                                        <span data-star="5"></span>
                                        <span data-star="4"></span>
                                        <span data-star="3"></span>
                                        <span data-star="2"></span>
                                        <span data-star="1"></span>
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

</div>
<?php

$js = <<<JS
$(document).on('change','#reviews-sort-by', function() {
let sort_by = $(this).val();
var divList = $(".rev_bl");

if (sort_by == 'rating') {
    divList.sort(function(a, b){
        return $(b).data("rating")-$(a).data("rating")
    });
}

if (sort_by == 'date') {
    divList.sort(function(a, b){
        return $(b).data("date")-$(a).data("date")
    });
}

$("#review").html(divList);
});

JS;

$this->registerJs($js, \yii\web\View::POS_READY);

