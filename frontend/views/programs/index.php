<?php

use common\models\Functions;

use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programs';
$this->params['breadcrumbs'][] = $this->title;

?>

    <div class="content container">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Каталог</li>
                </ol>
            </nav>
        </div>

        <div class="main">
            <div class="title_bl">
                <h1 class="title">Медицинские информационные системы</h1>
                <p>Смотрите лучшие программы для клиник и медицинских центров. Читайте отзывы, сравнивайте функции и
                    узнайте подробнее <a href="#">Как выбрать медицинскую информационную систему (МИС)</a></p>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="filter">
                        <div class="btn_mobile">
                            <a data-toggle="collapse" href="#filter_c" role="button" aria-expanded="false"><span>развернуть фильтр</span>
                                <img alt="" src="/img/arr_filter.png"></a>
                        </div>

                        <div id="filter_c" class="filter_c collapse">
                            <div class="filter_bl">
                                <form class="row" method="get" action="<?= Url::to(['/programs']); ?>">
                                    <div class="col-lg-4 col-xl-12">
                                        <div class="fl price">
                                            <div class="titl">Цена</div>
                                            <div class="input">
                                                от <input type="text" name="price_from" class="form-control-range"
                                                          id="minPrice" value="<?= $searchModel->price_from; ?>">
                                                до <input type="text" name="price_to" class="form-control-range mr-xl-0"
                                                          id="maxPrice" value="<?= $searchModel->price_to; ?>">
                                                <div id="slider-range"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-12">
                                        <div class="fl pricing">
                                            <div class="titl"><a data-toggle="collapse" href="#pricing" role="button"
                                                                 aria-expanded="true" class="active">Ценооброзование
                                                    <img alt="" src="/img/arr_fl.png"></a></div>
                                            <div class="input collapse show" id="pricing">
                                                <label>
                                                    <input type="checkbox" <? if ($searchModel->has_free) echo "checked"; ?> name="has_free" class="checkbox d-none">
                                                    <span class="checkbox__text">Бесплатная версия</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="has_month_plan" <? if ($searchModel->has_month_plan) echo "checked"; ?>
                                                           class="checkbox d-none">
                                                    <span class="checkbox__text">Месячная подписка</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="has_year_plan" <? if ($searchModel->has_year_plan) echo "checked"; ?> class="checkbox d-none">
                                                    <span class="checkbox__text">Годовая подписка</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-12">
                                        <div class="fl functions">
                                            <div class="titl"><a data-toggle="collapse" href="#functions" role="button"
                                                                 aria-expanded="true" class="active">Функции <img alt=""
                                                                                                                  src="/img/arr_fl.png"></a>
                                            </div>
                                            <? if ($functions = Functions::find()->all()) { ?>
                                                <div class="input collapse show" id="functions">
                                                    <?php /** @var Functions $function */
                                                    foreach ($functions as $function) { ?>
                                                        <label>
                                                            <input type="checkbox" name="functions[]" <? if (in_array($function->id,$searchModel->functions)) echo "checked"; ?>
                                                                   value="<?= $function->id; ?>"
                                                                   class="checkbox d-none">
                                                            <span class="checkbox__text"><?= $function->name; ?></span>
                                                        </label>
                                                    <? } ?>
                                                </div>
                                            <? } ?>
                                        </div>
                                        <div class="fl rating_">
                                            <div class="titl"><a data-toggle="collapse" href="#rating_" role="button"
                                                                 aria-expanded="false">Рейтинг <img alt=""
                                                                                                    src="/img/arr_fl.png"></a>
                                            </div>
                                            <div class="input collapse" id="rating_">
                                                <label>
                                                    <input type="checkbox" name="rating[]" class="checkbox d-none">
                                                    <span class="checkbox__text">Аудит</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="rating[]" class="checkbox d-none">
                                                    <span class="checkbox__text">Архивация почты</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="rating[]" class="checkbox d-none">
                                                    <span class="checkbox__text">Шифрование</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="rating[]" class="checkbox d-none">
                                                    <span class="checkbox__text">Статистика</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="rating[]" class="checkbox d-none">
                                                    <span class="checkbox__text">Спам фильтр</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="fl crm">
                                            <div class="titl"><a data-toggle="collapse" href="#crm" role="button"
                                                                 aria-expanded="false">CRM-аналитика <img alt=""
                                                                                                          src="/img/arr_fl.png"></a>
                                            </div>
                                            <div class="input collapse" id="crm">
                                                <label>
                                                    <input type="checkbox" name="pricing" class="checkbox d-none">
                                                    <span class="checkbox__text">Аудит</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="pricing" class="checkbox d-none">
                                                    <span class="checkbox__text">Архивация почты</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="pricing" class="checkbox d-none">
                                                    <span class="checkbox__text">Шифрование</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="pricing" class="checkbox d-none">
                                                    <span class="checkbox__text">Статистика</span>
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="pricing" class="checkbox d-none">
                                                    <span class="checkbox__text">Спам фильтр</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-xl-12">
                                        <div class="bt">
                                            <button type="submit" class="btn btn-find">Найти</button>
                                        </div>
                                        <div class="bt">
                                            <button type="button" class="btn btn-clear" id="clearFilter">очистить
                                                фильтр
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="tabs col-xl-9">
                    <div class="sort">
                        Сортировать по:
                        <select>
                            <option selected>по популярности</option>
                            <option>по цене</option>
                            <option>по рейтингу</option>
                            <option>еще как-нибудь</option>
                            <option>еще как-нибудь</option>
                        </select>
                    </div>


                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                       // 'layout' => "{pager}\n{items}\n{summary}",
                        'itemView' => '_list_item',
                    ]);
                    ?>




                </div>
            </div>


            <div class="choice_bl">
                <h2>Как выбрать Медицинскую Информационную Систему (МИС)</h2>

                <div class="row" role="tabpanel">
                    <div class="col-md-5 col-xl-4">
                        <div class="library">
                            <p class="titl">Наша библиотека</p>
                            <div class="list-group" id="myList" role="tablist">
                                <a class="active" data-toggle="list" href="#tab1" role="tab">Что такое программное
                                    обеспечение управления взаимоотношениями с клиентами?</a>
                                <hr>
                                <a class="" data-toggle="list" href="#tab2" role="tab">Что такое программное обеспечение
                                    управления взаимоотношениями с клиентами?</a>
                                <hr>
                                <a class="" data-toggle="list" href="#tab3" role="tab">Что такое программное обеспечение
                                    управления взаимоотношениями с клиентами?</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xl-8 text">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <h3>1. Что такое программное обеспечение</h3>
                                <p>В наши дни понятие словосочетания программное обеспечение,
                                    имеющее своё сокращённое обозначение – ПО, достаточно
                                    широкую трактовку. От него зависит функционирование
                                    подавляющего большинства компьютерной техники.</p>
                                <hr>
                                <h3>2. Что такое программное обеспечение</h3>
                                <ul>
                                    <li><b>В наши дни понятие словосочетания программное</b><br>
                                        От него зависит функционирование подавляющего большинства
                                        компьютерной техники, электронных приборов и любое другое
                                        интеллектуальное оборудование. ПО функционально
                                    </li>
                                    <li><b>В наши дни понятие словосочетания программное</b><br>
                                        От него зависит функционирование подавляющего большинства
                                        компьютерной техники, электронных приборов и любое другое
                                        интеллектуальное оборудование. ПО функционально
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab2" role="tabpanel">
                                <h3>1. Что такое программное обеспечение 2222</h3>
                                <p>В наши дни понятие словосочетания программное обеспечение,
                                    имеющее своё сокращённое обозначение – ПО, достаточно
                                    широкую трактовку. От него зависит функционирование
                                    подавляющего большинства компьютерной техники.</p>
                                <hr>
                                <h3>2. Что такое программное обеспечение</h3>
                                <ul>
                                    <li><b>В наши дни понятие словосочетания программное</b><br>
                                        От него зависит функционирование подавляющего большинства
                                        компьютерной техники, электронных приборов и любое другое
                                        интеллектуальное оборудование. ПО функционально
                                    </li>
                                    <li><b>В наши дни понятие словосочетания программное</b><br>
                                        От него зависит функционирование подавляющего большинства
                                        компьютерной техники, электронных приборов и любое другое
                                        интеллектуальное оборудование. ПО функционально
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab3" role="tabpanel">
                                <h3>1. Что такое программное обеспечение 3333</h3>
                                <p>В наши дни понятие словосочетания программное обеспечение,
                                    имеющее своё сокращённое обозначение – ПО, достаточно
                                    широкую трактовку. От него зависит функционирование
                                    подавляющего большинства компьютерной техники.</p>
                                <hr>
                                <h3>2. Что такое программное обеспечение</h3>
                                <ul>
                                    <li><b>В наши дни понятие словосочетания программное</b><br>
                                        От него зависит функционирование подавляющего большинства
                                        компьютерной техники, электронных приборов и любое другое
                                        интеллектуальное оборудование. ПО функционально
                                    </li>
                                    <li><b>В наши дни понятие словосочетания программное</b><br>
                                        От него зависит функционирование подавляющего большинства
                                        компьютерной техники, электронных приборов и любое другое
                                        интеллектуальное оборудование. ПО функционально
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>

<?php
$js = <<<JS
function triplets(str) {
			return str.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u202f');
		}
				
		$(function(){			
			// 	Фильтр товаров, стр. каталог
			$("#slider-range").slider({
				range: true,
				min: 0,
				step: 1000,
				max: 999999,
				values: [ 50000, 250000 ],
				slide: function( event, ui ) {
					$( "#minPrice" ).val(triplets(ui.values[0]));
					$( "#maxPrice" ).val(triplets(ui.values[1]));
				}
			});


			$(document).ready(function() {
				checkSize();
				$(window).resize(checkSize);
			});

			function checkSize(){
				if ($(".container").css("max-width") == "960px"){
					$('#functions').collapse('hide');
					$(".functions .titl a").removeClass('active');
				}

			}
			$('.katalog .fl .titl a').click(function(){
				if ($(this).attr('aria-expanded') !== "true") {
					$(this).addClass('active');
				}
				else {
					$(this).removeClass('active');
				}
			});
			$('.katalog .btn_mobile a').click(function(){
				if ($(this).attr('aria-expanded') !== "true") {
					$(this).addClass('active');
				}
				else {
					$(this).removeClass('active');
				}
			});
			$('#clearFilter').click(function(){
				$('#filter_c input:checked').prop('checked', false);
			}); 
		});
JS;
Yii::$app->view->registerJs($js, \yii\web\View::POS_READY);