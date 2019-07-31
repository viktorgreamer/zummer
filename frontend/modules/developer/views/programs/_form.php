<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="content">
        <div class="container">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Личный кабинет</li>
                    </ol>
                </nav>
            </div>

            <div class="main">
                <?= $this->render('../layouts/admin_nav'); ?>
                <div class="product_bl row">
                    <div class="col-md-5 col-xl-4 tab_l">
                        <div class="row">
                            <div class="col-9 col-lg-7 pr_name">
                                <p><?= $model->name; ?></p>
                                <img src="<?= $model->getLogo(); ?>">
                            </div>
                            <div class="rating col-3 col-lg-5 d-flex align-items-end justify-content-end">
                                <div class="stars">
                                    <span data-star="5"></span>
                                    <span data-star="4"></span>
                                    <span data-star="3"></span>
                                    <span data-star="2"></span>
                                    <span data-star="1"></span>
                                </div>
                                <div class="num">4.5</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xl-8 tab_r d-md-flex align-items-end justify-content-end">
                        <div class="bt">
                            <a href="<?= Url::to('/developer/programs/create'); ?>" class="btn bnt-price"><span>+</span>
                                Добавить продукт</a>
                        </div>

                        <? if ($model->id && !$model->tariff) { ?>
                            <div class="bt">
                                <a href="<?= Url::to(['/developer/programs/paid', 'id' => $model->id]); ?>"
                                   class="btn bnt-price">Обновить до максимум</a>
                            </div>
                        <? } ?>
                    </div>
                </div>
                <div class="inform_bl row" role="tabpanel">
                    <div class="col-md-4 col-lg-4 col-xl-3 buttons_m">
                        <div class="buttons">
                            <div class="list-group" id="myList" role="tablist">
                                <a class="active" data-toggle="list" href="#tab1" role="tab">Базовая информация</a>
                                <a class="" data-toggle="list" href="#tab2" role="tab">Информация о продукте</a>
                                <a class="" data-toggle="list" href="#tab3" role="tab">Характеристики</a>
                                <a class="" data-toggle="list" href="#tab4" role="tab">Добавить фото, видео</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-xl-9 text">
                        <div class="tab-content">
                            <?= $this->render('_form/tab1.php', compact('model')); ?>
                            <?= $this->render('_form/tab2.php', compact('model')); ?>
                            <?= $this->render('_form/tab3.php', compact('model')); ?>
                            <?= $this->render('_form/tab4.php', compact('model')); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


<?

$js = <<<JS
$('.fl .titl a').click(function(){
			if ($(this).attr('aria-expanded') !== "true") {
				$(this).addClass('active');
			}
			else {
				$(this).removeClass('active');
			}
		});
		$('.btn_mobile a').click(function(){
			if ($(this).attr('aria-expanded') !== "true") {
				$(this).addClass('active');
			}
			else {
				$(this).removeClass('active');
			}
		});
	
		/*function limitText(limitField, limitNum) {
			$()
			if (limitField.value.length > limitNum) {
				limitField.value = limitField.value.substring(0, limitNum);
			}
		}*/
		//onKeyDown="limitText(this,5);" 
		//onKeyUp="limitText(this,5);"
		
		
		
		;(function (document, window, index){
			'use strict';
			var inputs = document.querySelectorAll('.inputfile');
			Array.prototype.forEach.call(inputs, function (input) {
				var label = input.nextElementSibling,
						labelVal = label.innerHTML;

				input.addEventListener('change', function (e) {
					var fileName = '';
					if (this.files && this.files.length > 1)
						fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
					else
						fileName = e.target.value.split(".").pop();

					if (fileName)
						label.querySelector('span').innerHTML = fileName;
					else
						label.innerHTML = labelVal;
				});

				// Firefox bug fix
				input.addEventListener('focus', function () {
					input.classList.add('has-focus');
				});
				input.addEventListener('blur', function () {
					input.classList.remove('has-focus');
				});
			});
		}(document, window, 0));
		
		$(document).ready( function() {        
			$('.send-txt').keydown(function(event){
				var maxLen = $(this).siblings('.lineCount').children('.allCount').text();
				var Length = $(this).val().length;
				var AmountLeft = maxLen - Length;
				if (event.which != 8) {
					$(this).siblings('.lineCount').children('.nowCount').text(Length+1);
				}

				if(Length >= maxLen-1){
					if (event.which != 8) {
						return false;
					}
				}
			});
		});
		
		


JS;
Yii::$app->view->registerJs($js, \yii\web\View::POS_READY);