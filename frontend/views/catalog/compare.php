<?php

use common\models\Categories;
use common\models\CategoryFunctionsAssignment;
use common\models\Functions;
use common\models\Programs;
use yii\helpers\ArrayHelper;

/** @var Programs[] $programs */
/** @var Programs $program */
$programs = Programs::toCompare();

/** @var \yii\web\View $this */

$this->title = 'Сравнить программы';
?>


    <div class="content container">

        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Сравнить программы</li>
                </ol>
            </nav>
        </div>


        <div class="main">
            <div class="title_bl">
                <h1 class="title">Сравнить программы</h1>
            </div>

            <div class="tabs row">
                <div class="col-md-4 col-lg-3 tab_info">
                    <div class="add_compare">
                        <a href="#" class="<!--disabled-->"><i>+</i> добавить к сравнению <span></span></a>
                    </div>
                    <div class="share d-none d-md-block">
                        Поделиться:
                        <a href="#"><img alt="" src="/img/icons/ico-tv.png"></a>
                        <a href="#"><img alt="" src="/img/icons/ico-vk.png"></a>
                        <a href="#"><img alt="" src="/img/icons/ico-fb.png"></a>
                        <a href="#"><img alt="" src="/img/icons/ico-inst.png"></a>
                        <a href="#"><img alt="" src="/img/icons/ico-ok.png"></a>
                    </div>

                    <div class="tab_bottom d-none d-md-block">
                        <div class="line">
                            <p class="titl">Рейтинг</p>
                        </div>
                        <div class="line">
                            <p class="titl">Начальная цена</p>
                        </div>
                        <div class="line">
                            <p class="titl">Сервис подойдет для</p>
                        </div>
                        <div class="line">
                            <p class="titl">Количество пользователей</p>
                        </div>
                        <div class="line">
                            <p class="titl">Удобство</p>
                        </div>
                        <div class="line">
                            <p class="titl">Функционал</p>
                        </div>
                        <div class="line">
                            <p class="titl">Скриншоты</p>
                        </div>
                        <div class="line functions">
                            <p class="titl">Функционал</p>
                        </div>
                        <div class="line scrn">
                            <p class="titl">Скриншоты</p>
                        </div>
                        <div class="line platforms">
                            <p class="titl">Платформы</p>
                        </div>
                        <div class="line support">
                            <p class="titl">Службы поддержки</p>
                        </div>
                        <div class="line">
                            <p class="titl">Обучение</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9 tab_sl">
                    <div class="owl-carousel share_sl">
                        <?php foreach ($programs as $program) { ?>
                            <div class="item">
                                <div class="tab_top">
                                    <a href="#" class="close_btn remove-from-compare" data-program_id="<?= $program->id;?>"><img alt="" src="/img/close.png"></a>
                                    <div class="img">
                                        <a href="#"><img alt="" src="<?= $program->getLogo(); ?>"></a>
                                    </div>

                                    <div class="bt">
                                        <a href="<?= $program->link; ?>" class="btn btn-green btn-more">открыть сайт</a>
                                    </div>
                                    <div class="bt">
                                        <a href="<?= $program->trial_link; ?>" class="btn btn-green btn-more">демо-доступ</a>
                                    </div>
                                </div>
                                <div class="tab_bottom">
                                    <div class="line">
                                        <p class="titl">Рейтинг</p>
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
                                    </div>
                                    <div class="line">
                                        <p class="titl">Начальная цена</p>
                                        <p>от <?= $program->price_from; ?> руб./p>
                                    </div>
                                    <div class="line">
                                        <p class="titl">Сервис подойдет для</p>
                                        <p>Для подбора персонала</p>
                                    </div>
                                    <div class="line">
                                        <p class="titl">Количество пользователей</p>
                                        <p>50 000 человек</p>
                                    </div>
                                    <div class="line">
                                        <p class="titl">Удобство</p>
                                        <div class="rating">
                                            <div class="stars">
                                                <span data-star="5"></span>
                                                <span data-star="4"></span>
                                                <span data-star="3"></span>
                                                <span data-star="2"></span>
                                                <span data-star="1"></span>
                                            </div>
                                            <div class="num"><?= $program->rating_convenience; ?></div>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <p class="titl">Функционал</p>
                                        <div class="rating">
                                            <div class="stars">
                                                <span data-star="5"></span>
                                                <span data-star="4"></span>
                                                <span data-star="3"></span>
                                                <span data-star="2"></span>
                                                <span data-star="1"></span>
                                            </div>
                                            <div class="num"><?= $program->rating_functions; ?></div>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <p class="titl">Служба поддержки</p>
                                        <div class="rating">
                                            <div class="stars">
                                                <span data-star="1"></span>
                                                <span data-star="5"></span>
                                                <span data-star="4"></span>
                                                <span data-star="3"></span>
                                                <span data-star="2"></span>
                                            </div>
                                            <div class="num"><?= $program->rating_support; ?></div>
                                        </div>
                                    </div>
                                    <?php if ($functions = CategoryFunctionsAssignment::getFunctionsByCategory($program->category_id)) { ?>
                                        <div class="line functions">
                                            <p class="titl">Функционал</p>
                                            <ul>
                                                <?php /** @var Functions $function */
                                                $functions_id = ArrayHelper::getColumn($program->functions, 'id');
                                                foreach ($functions as $function) { ?>
                                                    <li><img alt=""
                                                             src="/img/<? if (in_array($function->id, $functions_id)) echo "yes"; else "no"; ?>.png"> <?= $function->name; ?>
                                                    </li>
                                                <? } ?>
                                            </ul>
                                        </div>
                                    <? } ?>
                                    <? if ($program->images) { ?>
                                        <div class="line scrn">
                                        <div class="photos">
                                            <?php foreach ($program->images as $image) { ?>
                                                <a href="/img/logo.png" data-fancybox="tab1"><img alt=""
                                                                                                  src="<?= $image->src; ?>"></a>
                                            <? } ?>
                                        </div>
                                        </div><? } ?>
                                    <?php if ($program->platforms): ?>
                                        <div class="line platforms">
                                            <p class="titl">Платформы</p>
                                            <p><?= implode(", ", ArrayHelper::getColumn($program->platforms,'name' ));?></p>
                                        </div>
                                    <?php endif ?>
                                    <?php Yii::error($program->support_map);?>
                                    <?php if ($program->support_map): ?>
                                        <div class="line support">
                                            <p class="titl">Службы поддержки</p>
                                            <p><?= implode(", ", ArrayHelper::getColumn($program->support_map, function($item) {
                                                   return Programs::mapLearning()[$item];
                                                }));?></p>
                                        </div>
                                    <?php endif ?>
                                    <?php if ($program->learning_map): ?>
                                        <div class="line">
                                            <p class="titl">Обучение</p>
                                            <p><?= implode(", ", ArrayHelper::getColumn($program->learning_map, function($item) {
                                                    return Programs::mapSupport()[$item];
                                                })); ?></p>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <? } ?>   </div>
                </div>
            </div>
            <?php if ($similarPrograms = Programs::getSimilarByCategory($categories = Categories::find()->select('id')->column())): ?>
                <div class="similar">
                    <p class="title">Похожие программы</p>

                    <div class="tabs">
                        <?php foreach ($similarPrograms as $key => $similarProgram): ?>

                        <?php $tabClass = ($key == 0)?  "tab card_program" : "tab card_program d-none d-md-block";  ?>
                            <div class="tab card_program">
                                <div class="row">
                                    <div class="col-md-3 col-xl-4 img d-md-flex flex-column">
                                        <a href="#" class="order-xl-2"><img alt="" src="/img/bitrix.png"></a>

                                        <div class="add oredr-xl-1">
                                            <a href="#" class="add-to-compare" data-id="<?= $similarProgram->id;?>"><i>+</i> <b>сравнить</b> <span></span></a>
                                        </div>

                                    </div>
                                    <div class="col-md-9 col-xl-8 info">
                                        <div class="row tabs_info">
                                            <div class="col-md-4 name">
                                                <p><a href="">Битрикс24</a></p>
                                            </div>
                                            <div class="col-md-4 demo">
                                                <p class="titl">демо-доступ</p>
                                                <p>Бесплатно 30 дней</p>
                                            </div>
                                            <div class="col-md-4 stars">
                                                <p class="titl">рейтинг</p>
                                                <p><img alt="" src="/img/star_active.png"> 4.5 ( <a href="#">12
                                                        отзывов</a>
                                                    )
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <p>Битрикс24 — это целый корпоративный портал. Помимо собственно доступен
                                                блок
                                                работы с проектами... <a href="btn">Узнайте больше о Битрикс24</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab card_program d-none d-md-block">
                                <div class="row">
                                    <div class="col-md-3 col-xl-4 img d-md-flex flex-column">
                                        <a href="#" class="order-xl-2"><img alt="" src="/img/bitrix.png"></a>

                                        <div class="add oredr-xl-1">
                                            <a href="#"><i>+</i> <b>сравнить</b> <span></span></a>
                                        </div>

                                    </div>
                                    <div class="col-md-9 col-xl-8 info">
                                        <div class="row tabs_info">
                                            <div class="col-md-4 name">
                                                <p><a href="">Битрикс24</a></p>
                                            </div>
                                            <div class="col-md-4 demo">
                                                <p class="titl">демо-доступ</p>
                                                <p>Бесплатно 30 дней</p>
                                            </div>
                                            <div class="col-md-4 stars">
                                                <p class="titl">рейтинг</p>
                                                <p><img alt="" src="/img/star_active.png"> 4.5 ( <a href="#">12
                                                        отзывов</a>
                                                    )
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <p>Битрикс24 — это целый корпоративный портал. Помимо собственно доступен
                                                блок
                                                работы с проектами... <a href="btn">Узнайте больше о Битрикс24</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="see_more">
                        <a href="#" class="active">Смотреть еще <img alt="" src="/img/load.png"></a>
                    </div>

                </div>
            <?php endif ?>
        </div>
    </div>
<?

$js = <<<JS
$(function(){ 
			 if ($('.share_sl .owl-nav').hasClass('disabled')){
				$('.share_tabs').css("padding-top", 0);
			 }
			 else{
				 $('.share_tabs').css("padding-top", 65);
			 }
		
		
			// Карусель "Сравнивание товаров", стр. сравнить
			$('.share_sl').owlCarousel({
				loop:false,
				margin:15,
				nav:true,
				navText: false,
				dots: false,
				items:2,
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1,
					},
					560:{
						items:1,
						margin:25,
					},
					767:{
						items:2,
						margin:25,
					},
					992:{
						items:3,
						mouseDrag: false,
						touchDrag: false,
						pullDrag: false,
						freeDrag: false
					}
				}
			});
			/****************************************************/
		});
JS;
$this->registerJs($js, 4);
