<?php
use common\models\Programs;
use yii\helpers\Html;
use yii\helpers\Url;

if ($programs = Programs::getMainPagePrograms(3)) { ?>
    <div class="programs_popul container">
        <div class="title_bl">
            <p class="title">Популярные программы</p>
        </div>
        <div class="tabs">
            <? /** @var Programs $program */
            foreach ($programs as $program) { ?>
                <div class="tab">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 img">
                            <div class="tab d-flex">
                                <div class="popular">Популярная <span></span></div>
                                <a href="<?= Url::to(['catalog/view','id' => $program->id]);?>" class="align-self-center"><img alt="" class="logo-big" src="<?= $program->getLogo(); ?>"></a>
                                <div class="compare add">
                                    <a href="#"><i>+</i> сравнить <span></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <div class="row row_desc">
                                <div class="col-lg-8 col-xl-9 desc">
                                    <div class="row inform">
                                        <div class="col-6 col-md-4 col-xl-3 tab">
                                            <p class="titl">сайт</p>
                                            <p><?= Html::a(parse_url($program->link, PHP_URL_HOST),$program->link); ?></p>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3 tab">
                                            <p class="titl">демо-доступ</p>
                                            <p><?= $program->getDemo(); ?></p>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3 tab d-md-none d-xl-block">
                                            <p class="titl">стоимость</p>
                                            <p><?= number_format($program->price_from,0,"."," "); ?> руб.</p>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3 tab">
                                            <p class="titl">рейтинг</p>
                                            <p><img alt="" class="star" src="/img/star.png"> <?= $program->rating; ?></p>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p><?= $program->description; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 buttons d-lg-flex align-content-center flex-wrap">
                                    <div class="bt">
                                        <a href="<?= Url::to(['catalog/view', 'id' => $program->id]); ?>" class="btn btn-green bnt-more">Подробнее <img alt="" src="/img/arrow-btn.png"></a>
                                    </div>
                                    <div class="bt">
                                        <a href="#" class="btn bnt-price">Цены</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>


    <?
}
?>
