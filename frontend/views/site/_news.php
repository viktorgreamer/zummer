
<?php

use common\models\ContentNews;
use yii\helpers\Url;

if ($news = ContentNews::findLast()) { ?>
    <div class="news container">
        <div class="title_bl">
            <p class="title">Новости</p>
            <div class="show_all d-none d-md-block ">
                <a href="<?= Url::to('news'); ?>" class="btn btn-">Читать все новости <img alt="" src="/img/arrow_green.png"></a>
            </div>
        </div>

        <div class="row tabs">
            <? /** @var ContentNews $new */
            foreach ($news as $key => $new) { ?>
            <div class="<?= ContentNews::tabClasses()[$key];?>">
                <div class="tab">

                    <?php if ($new->image) { ?>
                        <div class="img">
                            <a href="#"><img alt="" src="<?= Url::to($new->image); ?>"></a>
                        </div>
                   <? } ?>

                    <p class="titl"><a href="<?= Url::to(['news/view','id' => $new->id]); ?>"><?= $new->name; ?></a></p>

                    <div class="text">
                        <div class="desc">

                            <p><?= $new->getBody(); ?></p>
                            <div class="bt">
                                <a href="<?= Url::to(['news/view','id' => $new->id]); ?>"><img alt="" src="/img/arrow_green.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? } ?>
        </div>
    </div>

<?  } ?>