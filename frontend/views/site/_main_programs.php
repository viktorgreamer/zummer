<?php

use common\models\Programs;
use yii\helpers\Html;
use yii\helpers\Url;

if ($programs = Programs::main(4)) { ?>
    <div class="programs_for container">
        <div class="row tabs">
            <?php /** @var Programs $program */
            foreach ($programs as $key => $program) {
                ?>
                <div class="<?= Programs::colClasses()[$key]; ?>">
                    <div class="tab">
                        <div class="img">
                            <a href="#"><img alt="" src="<?= $program->getLogo(); ?>"></a>
                        </div>
                        <div class="rating">
                            <div class="stars">
                                <span data-star="5"></span>
                                <span data-star="4"></span>
                                <span data-star="3"></span>
                                <span data-star="2"></span>
                                <span data-star="1"></span>
                            </div>
                            <div class="num"><?= $program->rating; ?></div>
                        </div>
                        <?php if ($functions = $program->getFunctions()->limit(4)->all()) { ?>
                            <ul class="specific">
                                <?php /** @var \common\models\Functions $function */
                                foreach ($functions as $function) { ?>
                                    <li><i></i> <?= $function->name; ?></li>
                                <? } ?>
                            </ul>
                        <? } ?>
                        <?php if ($program->price_from) { ?>
                            <div class="price">
                                <p>от <b><span><?= $program->price_from; ?></span> руб.</b></p>
                            </div>
                        <? } ?>
                        <div class="bt">
                            <a href="<?= Url::to(['programs/view', 'id' => $program->id]); ?>"
                               class="btn btn-green bnt-more">Подробнее <img alt="" src="/img/arrow-btn.png"></a>
                        </div>
                    </div>
                </div>
            <? } ?>

        </div>

        <div class="see_more">
            <a href="#" class="active">Смотреть еще <img alt="" src="/img/load.png"></a>
        </div>
    </div>
    <?
}
?>

