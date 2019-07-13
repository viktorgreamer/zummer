<?php

use common\models\ContentCategories;
use yii\helpers\Url;

/** @var \yii\web\View $this */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = "Новости";

?>


<div class="content container">

    <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= Url::to(['/']); ?>">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Новости</li>
            </ol>
        </nav>
    </div>


    <div class="main">
        <div class="title_bl">
            <h1 class="title">Новости</h1>
        </div>
        <? if ($categories = ContentCategories::find()->all()) { ?>
            <div class="categories">
                <div class="owl-carousel news_category">
                    <div class="item">
                        <a class="active" href="<?= Url::to(['/']); ?>">Все</a>
                    </div>
                    <?php /** @var ContentCategories $category */
                    foreach ($categories as $category) { ?>
                        <div class="item">
                            <a href="<?= Url::to(['/news', 'category_id' => $category->id]); ?>"><?= $category->name; ?></a>
                        </div>
                    <? } ?>
                </div>
            </div>
        <? } ?>
        <div class="thems">
            <p>По темам:</p>
            <span>Битрикс 24</span>
            <span class="active">Интеграция CRM</span>
            <span>Мегаплан</span>
            <span>Zadarma</span>
        </div>

        <?
        if ($dataProvider->getModels()) { ?>
            <div class="row tabs">
                <?php /** @var \common\models\ContentNews $new */
                foreach ($dataProvider->getModels() as $key => $new) {
                    $keyClass = ($key == 0) ? "d-none d-lg-block col-lg-8 large" : "col-md-6 col-lg-4";
                    ?>
                    <div class="<?= $keyClass; ?>">
                        <div class="tab">
                            <div class="img">
                                <a href="#"><img alt="" src="<?= $new->image; ?>"></a>
                            </div>

                            <div class="body_news">
                                <p class="titl"><a href="#"><?= $new->name; ?></a></p>
                                <div class="desc">
                                    <p><?= mb_strimwidth($new->body, 0, 500, "..."); ?></p>
                                    <div class="bt">
                                        <a href="<?= Url::to(['/news/view', 'id' => $new->id]); ?>"><img alt=""
                                                                                                         src="/img/arrow_green.png"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>

            </div>
        <? } ?>

        <? /** @var \frontend\models\ContentNewsSearch $searchModel */
        echo $searchModel->getShowMore();
        ?>

    </div>
</div>
<?php
$js=<<<JS
$(document).on('click','.see_more',function(e) {
e.preventDefault();
console.log($(this).attr('value'));
$(document).find(".load_after_me").last().load($(this).attr('value'));
$(this).remove();
});
JS;

$this->registerJs($js,\yii\web\View::POS_READY);

