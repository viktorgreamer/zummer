<?php

/** @var Programs $model */
/** @var \yii\web\View $this */
$this->title = $model->name;

use common\models\CategoryFunctionsAssignment;
use common\models\Programs;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\helpers\Url; ?>

    <div class="content container">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                                href="<?= Url::to(['/catalog']); ?>">Каталог программ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $model->name; ?></li>
                </ol>
            </nav>
        </div>
        <div class="main">
            <div class="tab_product">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="img">
                            <a href="#"><img alt="" src="<?= $model->getLogo(); ?>"></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9 pr_info">
                        <div class="pr_info_main">
                            <p class="pr_title"><a href="<?= $model->link; ?>"><?= $model->name; ?></a></p>
                            <div class="pr_rating">
                                <p class="titl">рейтинг</p>
                                <div class="rating">
                                    <div class="stars">
                                    <?= $model->renderStars();?>
                                    </div>
                                    <div class="num"><?= $model->rating; ?> ( <a href="#"><?= count($model->reviews); ?>
                                            отзывов</a> )
                                    </div>
                                </div>
                            </div>
                            <div class="manager">
                                <a href="#"><img alt="" src="/img/manager.png"> <span>Чат с консультантом ZUMMER</span></a>
                            </div>


                            <?php if ($model->isPayed() && $model->tags): ?>
                                <div class="tags">
                                    <?php foreach ($model->tags as $tag) { ?>
                                        <a href="<?= $tag->link; ?>"><?= $tag->name; ?></a>
                                    <? } ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <?php if ($model->isPayed() || (!$popularPrograms = Programs::getPopular(2, $model->category_id))) { ?>
                            <div class="btns">
                                <div class="bt">
                                    <a class="btn bnt-price" href="<?= $model->link; ?>">открыть сайт</a>
                                </div>
                                <div class="bt">
                                    <a class="btn btn-green bnt-more" href="<?= $model->trial_link; ?>">пробная
                                        версия</a>
                                </div>
                            </div>

                        <?php } else { ?>
                            <div class="popular_prs">
                                <p class="titl">Популярные программы</p>
                                <ul>
                                    <?php /** @var Programs $program */
                                    foreach ($popularPrograms as $program) { ?>
                                        <li>
                                            <a class="titl" href="<?= $program->link; ?>"><?= $program->name; ?></a>
                                            <div class="rating">
                                                <div class="stars">
                                                   <?= $program->renderStars($program->rating);?>
                                                </div>
                                                <div class="num"><?= $program->rating; ?> (<a
                                                            href="<?= Url::to(['catalog/view', 'id' => $program->id]); ?>"><?= $program->getReviews()->count(); ?>
                                                        отзывов</a>)
                                                </div>
                                            </div>
                                        </li>
                                    <? } ?>
                                </ul>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>

            <div class="callout">
                <p class="titl"><?= $model->destination; ?></p>
            </div>

            <div class="row">
                <div class="col-md-7 order-md-2 info_bl">
                    <p class="titl_bl"><img alt="" src="/img/info_product.png"> О <?= $model->name; ?></p>

                    <?php if ($model->description) { ?>
                        <?= $model->description; ?>
                    <? } ?>

                    <?php if ($medias = $model->getMedia()) { ?>
                        <div class="sl_product">
                            <div id="sync1" class="owl-carousel sl_main">
                                <?php foreach ($medias as $media) { ?>
                                    <?php if (isset($media['video'])) { ?>
                                        <div class="item">
                                            <a data-fancybox class="video" href="<?= $media['video']; ?>"
                                               data-width="800"
                                               data-height="450">
                                                <div class="play">
                                                    <div class="circlephone" style="transform-origin: center;"></div>
                                                    <div class="circle-fill" style="transform-origin: center;"></div>
                                                    <div class="img-circle" style="transform-origin: center;">
                                                        <div class="img-circleblock"
                                                             style="transform-origin: center;"></div>
                                                    </div>
                                                </div>
                                                <img alt="" src="<?= $model->getShotFromVideo(); ?>">
                                            </a>
                                        </div>
                                    <? } ?>
                                <? } ?>
                                <?php if (isset($media['image'])) { ?>
                                    <div class="item">
                                        <a data-fancybox class="image" href="<?= $media['image']->src; ?>">
                                            <img alt="" src="<?= $media['image']->src; ?>"></a>
                                    </div>
                                <? } ?>
                            </div>
                            <?php if ($medias = $model->getMedia()) { ?>
                            <div id="sync2" class="owl-carousel sl_min">
                                <?php foreach ($medias as $media) { ?>
                                    <?php if (isset($media['video'])) { ?>
                                        <div class="item"><img alt="" src="<?= $model->getShotFromVideo(); ?>"></div>
                                    <?php } else ?>
                                        <div class="item"><img alt="" src="<?= $media['image']->src; ?>"></div>
                                <? } ?>
                                <? } ?>
                            </div>
                        </div>

                    <? } ?>

                    <? if (($model->awards)) { ?>
                        <div class="awards">
                            <?php /** @var \common\models\ProgramsAwardsImages $award */
                            foreach ($model->awards as $award) { ?>
                                <img alt="<?= $award->description; ?>" src="<?= $award->src; ?> "
                                     title="<?= $award->description; ?>">
                            <? } ?>
                        </div>
                    <? } ?>

                </div>
                <? if ($model->rating) { ?>
                    <div class="col-md-5 order-md-1 option_bl">
                        <div class="option middle_rating">
                            <p class="titl_bl titl_opt"><img alt="" src="/img/star_product.png"> Средний рейтинг
                                <span><?= $model->rating; ?>/5</span></p>
                            <div class="table container">
                                <div class="row">
                                    <div class="col-6"><span>Общая оценка</span></div>
                                    <div class="col-6 d-flex">
                                        <div class="rating align-self-end">
                                            <div class="stars">
                                               <?= $model->renderStars($model->rating);?>
                                            </div>
                                            <div class="num"><?= $model->rating; ?> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span>Простота использования</span></div>
                                    <div class="col-6 d-flex">
                                        <div class="rating align-self-end">
                                            <div class="stars">
                                                <?= $model->renderStars($model->rating_convenience);?>
                                            </div>
                                            <div class="num"><?= $model->rating_convenience; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span>Поддержка пользователей</span></div>
                                    <div class="col-6 d-flex">
                                        <div class="rating align-self-end">
                                            <div class="stars">
                                                <?= $model->renderStars($model->rating_support);?>
                                            </div>
                                            <div class="num"><?= $model->rating_support; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span>Функциональность</span></div>
                                    <div class="col-6 d-flex">
                                        <div class="rating align-self-end">
                                            <div class="stars">
                                                <?= $model->renderStars($model->rating_functions);?>
                                            </div>
                                            <div class="num"><?= $model->rating_functions; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bt">
                                <a class="btn btn-green" href="<?= $model->link; ?>">Посмотреть этот продукт</a>
                            </div>
                        </div>


                        <div class="option about_product">
                            <p class="titl_bl titl_opt"><img alt="" src="/img/more_product.png"> Подробнее о продукте
                            </p>

                            <table>
                                <?php if ($model->price_from) { ?>
                                    <tr>
                                        <td class="name">Стартовая цена:</td>
                                        <td><?= $model->price_from; ?>р. / в месяц <br>
                                            <?php if ($model->isPayed() && $model->prices_link): ?>
                                                <a href="<?= $model->prices_link; ?>">подробнее о ценах</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <? } ?>


                                <?php if ($model->prices): ?>
                                    <tr>
                                        <td class="name">Информация о ценах:</td>
                                        <td><?= $model->prices; ?></td>
                                    </tr>
                                <?php endif ?>

                                <?php if ($model->has_free) { ?>
                                    <tr>
                                        <td class="name">Бесплатная версия:</td>
                                        <td><p class="ok">Да</p></td>
                                    </tr>
                                <? } ?>

                                <?php if ($model->trial_link) { ?>
                                    <tr>
                                        <td class="name">Бесплатная пробная версия:</td>
                                        <td><p class="ok">Да<?php if ($model->isPayed() && $model->trial_link): ?>, <a
                                                        href="<?= $model->trial_link; ?> ">получить</a>
                                                <?php endif ?>
                                            </p>
                                        </td>
                                    </tr>
                                <? } ?>
                                <? if ($model->platforms) { ?>
                                    <tr>
                                        <td class="name">Платформы:</td>
                                        <td>
                                            <p class="ok"><?= implode(", ", ArrayHelper::getColumn($model->platforms, 'name')); ?></p>
                                        </td>
                                    </tr>
                                <? } ?>

                                <?php if (is_array($model->learning_map) && $model->learning_map) { ?>
                                    <tr>
                                        <td class="name">Обучение:</td>
                                        <td>
                                            <? foreach ($model->learning_map as $item) { ?>
                                                <p class="ok"><?= Programs::mapLearning()[$item]; ?></p>
                                            <? } ?>
                                        </td>
                                    </tr>
                                <? } ?>

                                <?php if (is_array($model->support_map) && $model->support_map) { ?>
                                    <tr>
                                        <td class="name">Службa поддержки:</td>
                                        <td>
                                            <? foreach ($model->support_map as $item) { ?>
                                                <p class="ok"><?= Programs::mapSupport()[$item]; ?></p>
                                            <? } ?>
                                        </td>
                                    </tr>
                                <? } ?>
                            </table>
                        </div>
                        <? if ($model->developer) { ?>
                            <div class="option devel_product">
                                <p class="titl_bl titl_opt"><img alt="" src="/img/devel_product.png"> Разработчик
                                    продукта
                                </p>

                                <table>

                                    <? if ($model->developer->name) { ?>
                                        <tr>
                                            <td><?= $model->developer->name; ?></td>
                                        </tr>
                                    <? } ?>

                                    <? if ($model->developer->site) { ?>
                                        <tr>
                                            <td><?= $model->developer->site; ?></td>
                                        </tr>
                                    <? } ?>

                                    <? if ($model->developer->foundation_year) { ?>
                                        <tr>
                                            <td>Создан в <?= $model->developer->foundation_year; ?></td>
                                        </tr>
                                    <? } ?>


                                    <? if ($model->developer->country) { ?>
                                        <tr>
                                            <td><?= $model->developer->country; ?></td>
                                        </tr>
                                    <? } ?>
                                </table>
                            </div>
                        <? } ?>

                    </div>

                <? } ?>
            </div>

            <div class="product_bottom">
                <? if (($groupsFunctions = CategoryFunctionsAssignment::getGroupedFunctions($model->category_id))
                    && ($functions_id = ArrayHelper::getColumn($model->functions, 'id'))) { ?>
                    <div class="option functions_product">
                        <p class="titl_bl titl_opt"><img alt="" src="/img/functions_product.png"> Функции</p>
                        <?php /** @var \common\models\Functions $groupFunctions */
                        foreach ($groupsFunctions as $groupName => $groupFunctions) { ?>
                            <div class="collapse_bl">
                                <p class="titl_collapse">
                                    <a data-toggle="collapse" href="#<?= Inflector::transliterate($groupName); ?>"
                                       role="button"
                                       aria-expanded="true"
                                       class="active"><?= $groupName; ?>
                                        <img alt="" src="/img/arr_filter.png">
                                    </a>
                                </p>
                                <div id="<?= Inflector::transliterate($groupName); ?>" class="tabs collapse show">
                                    <div class="tabs_row">
                                        <? /** @var \common\models\Functions $function */
                                        foreach ($groupFunctions as $function) { ?>
                                            <div class="tab <? if (in_array($function->id, $functions_id)) echo 'ok';
                                            else echo "no"; ?>"><?= $function->name; ?></div>
                                        <? } ?>

                                    </div>
                                </div>
                            </div>

                        <? } ?>
                    </div>


                <? } ?>
            </div>
            <? if ($model->reviews) {
                echo $this->render('reviews', ['model' => $model]);
            }
            ?>


        </div>
    </div>
<?php

$js = <<<JS

// 	Раскрывающиеся списки
		$('.option .titl_collapse a').click(function(){
			if ($(this).attr('aria-expanded') !== "true") {
				$(this).addClass('active');
			}
			else {
				$(this).removeClass('active');
			}
		});
			
		// Зависимые слайдеры
		$(document).ready(function() {

		  var sync1 = $("#sync1");
		  var sync2 = $("#sync2");
		  var slidesPerPage = 2; 
		  var syncedSecondary = true;

		  sync1.owlCarousel({
			items : 1,
			nav: false,
			slideSpeed : 1000,
			dots: false,
			loop: true,
			margin: 20,
			responsiveRefreshRate : 200,
			responsive:{
				560:{
					mouseDrag: false,
					touchDrag: false,
					pullDrag: false,
					freeDrag: false
				}
			},
		  }).on('changed.owl.carousel', syncPosition);

		  sync2
			.on('initialized.owl.carousel', function () {
			  sync2.find(".owl-item").eq(0).addClass("current");
			})
			.owlCarousel({
			items : slidesPerPage,
			dots: false,
			nav: false,
			smartSpeed: 200,
			slideSpeed : 500,
			margin: 20,
			slideBy: slidesPerPage,
			responsiveRefreshRate : 100,
			responsive:{
				0:{
					items:2
				},
				360:{
					items:3
				},
				560:{
					items:4,
					mouseDrag: false,
					touchDrag: false,
					pullDrag: false,
					freeDrag: false
				}
			}
			
			
			
			
		  }).on('changed.owl.carousel', syncPosition2);

		  function syncPosition(el) {
			//if you set loop to false, you have to restore this next line
			//var current = el.item.index;
			//if you disable loop you have to comment this block
			var count = el.item.count-1;
			var current = Math.round(el.item.index - (el.item.count/2) - .5);
			
			if(current < 0) {
			  current = count;
			}
			if(current > count) {
			  current = 0;
			}
			
			//end block

			sync2
			  .find(".owl-item")
			  .removeClass("current")
			  .eq(current)
			  .addClass("current");
			var onscreen = sync2.find('.owl-item.active').length - 1;
			var start = sync2.find('.owl-item.active').first().index();
			var end = sync2.find('.owl-item.active').last().index();
			
			if (current > end) {
			  sync2.data('owl.carousel').to(current, 100, true);
			}
			if (current < start) {
			  sync2.data('owl.carousel').to(current - onscreen, 100, true);
			}
		  }
		  
		  function syncPosition2(el) {
			if(syncedSecondary) {
			  var number = el.item.index;
			  sync1.data('owl.carousel').to(number, 100, true);
			}
		  }
		  
		  sync2.on("click", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).index();
			sync1.data('owl.carousel').to(number, 300, true);
		  });
		});
JS;

$this->registerJs($js, \yii\web\View::POS_READY);
