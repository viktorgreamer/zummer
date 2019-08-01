<?php

use common\models\ContentArticles;
use common\models\Functions;

use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог';
?>

    <div class="content container">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Каталог</li>
                </ol>
            </nav>
        </div>

        <div class="main">

            <?php if ($article = ContentArticles::getAdviseHeader($searchModel->category_id)) { ?>
                <div class="title_bl">
                    <h1 class="title"><?= $article->name; ?></h1>
                    <?= $article->body; ?>
                </div>
            <? } ?>
            <div class="row">

                <?= $this->render('_search', ['searchModel' => $searchModel]); ?>

                <div class="tabs col-xl-9">
                    <div class="sort">
                        Сортировать по:
                        <select id="programs-sort-by">
                            <option selected value="relevance">по релевантности</option>
                            <option value="popularity">по популярности</option>
                            <option value="price_from">по цене</option>
                            <option value="rating">по рейтингу</option>
                        </select>
                    </div>
                    <div id="programs">
                        <?
                        if ($dataProvider->getModels()) {
                            foreach ($dataProvider->getModels() as $model) {
                                echo $this->render('_list_item', ['model' => $model]);
                            }
                        }
                        ?>
                    </div>


                </div>
            </div>


            <div class="choice_bl">

                <? if ($article) { ?>
                    <h2><?= $article->name; ?></h2>
                <? } ?>

                <? if ($articles = ContentArticles::getAdvises($searchModel->category_id)) { ?>
                    <div class="row" role="tabpanel">
                        <div class="col-md-5 col-xl-4">
                            <div class="library">
                                <p class="titl">Наша библиотека</p>
                                <div class="list-group" id="myList" role="tablist">
                                    <? /** @var ContentArticles $article */
                                    foreach ($articles as $article) { ?>
                                        <a class="active" data-toggle="list" href="#tab<?= $article->id; ?>"
                                           role="tab"><?= $article->name; ?></a>
                                    <? } ?>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-xl-8 text">
                            <div class="tab-content">
                                <? /** @var ContentArticles $article */
                                foreach ($articles as $key => $article) { ?>
                                    <div class="tab-pane <?= !$key ? "active" : ""; ?>" id="tab1" role="tabpanel">
                                        <?= $article->body; ?>
                                    </div>
                                <? } ?>

                            </div>
                        </div>
                    </div>
                <? } ?>

            </div>


        </div>
    </div>

<?php
$js = <<<JS
$(document).on('change','#programs-sort-by', function() {
let sort_by = $(this).val();
var divList = $(".card_program");

if (sort_by == 'price_from') {
     divList.sort(function(a, b){
        return $(a).data(sort_by)-$(b).data(sort_by)
    });
} else {
    divList.sort(function(a, b){
        return $(b).data(sort_by)-$(a).data(sort_by)
    });
}
$("#programs").html(divList);
});

function triplets(str) {
			return str.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1\u202f');
		}
				
		$(function(){
		
		let start = 	$("#minPrice").val();
		start = parseInt(start.replace(/\s/g, ''));		
		let end = 	$("#maxPrice" ).val();
		
		end = parseInt(end.replace(/\s/g, ''));		
		console.log(start);
		console.log(end);
				
			// 	Фильтр товаров, стр. каталог
			$("#slider-range").slider({
				range: true,
				min: 0,
				step: 1000,
				max: 200000,
				values: [ start , end ],
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