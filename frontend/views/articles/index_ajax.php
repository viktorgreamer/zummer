<?php

use common\models\ContentCategories;
use yii\helpers\Url;

/** @var \yii\web\View $this */
/** @var \yii\data\ActiveDataProvider $dataProvider */


?>



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