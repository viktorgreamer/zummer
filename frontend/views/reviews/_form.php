<?php

/** @var \yii\web\View $this */
/** @var \common\models\Programs $program */
/** @var  \frontend\models\CreateReviewForm $model */

use yii\helpers\Html; ?>


    <div class="content container">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Написать отзыв</li>
                </ol>
            </nav>
        </div>


        <div class="main">
            <div class="title_bl">
                <h1 class="title">Написать отзыв о «<?= $program->name;?>»</h1>
                <p>Покупатели программ нуждаются в вашей помощи! Отзывы о продукте помогают другим принимать правильные
                    решения. Не уверены как написать отзыв? <!--Следуйте <a href="#" target="_blank">рекоммендациям</a></p>-->
            </div>

            <div class="login_mob d-md-none">
                <p>Авторизоваться</p>
                <a href="/site/auth?authclient=vkontakte"><img alt="" src="/img/icons/ico-vk_w.png"></a>
                <a href="/site/auth?authclient=google"><img alt="" src="/img/icons/ico-fb_w.png"></a>
                <a href="/site/auth?authclient=facebook"><img alt="" src="/img/icons/ico-fb_w.png"></a>
            </div>


            <div class="review_form">
                <form id="review_form" method="post">
                    <div class="tab tab1">
                        <p class="title">Представьтесь, пожалуйста</p>
                        <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam,\Yii::$app->getRequest()->getCsrfToken(),[]); ?>

                        <div class="form-group d-md-flex flex-wrap justify-content-center">
                            <input type="hidden" name="program_id" value="<?= $model->program_id;?>">
                            <input type="text" name="first_name" placeholder="Ваше имя *" value="<?= $model->first_name;?>">
                            <input type="text" name="last_name" placeholder="Фамилия *" value="<?= $model->last_name;?>">
                            <input type="text" name="industry" placeholder="Отрасль вашего бизнеса" value="<?= $model->industry;?>">
                            <input type="text" name="position" placeholder="Должность *" value="<?= $model->position;?>">
                            <input type="text" name="email" placeholder="E-mail *" value="<?= $model->email;?>">
                            <input type="text" name="using_time" placeholder="Как долго пользуетесь? *" value="<?= $model->using_time;?>">
                        </div>
                        <div class="nav_panel">
                            <p class="num_page"><span id="review_page">1</span>/2</p>
                            <div class="bt">
                                <input type="button" class="btn btn-green bnt-more next" value="Далее"
                                       onclick="reviewNextPage('review_form')">
                            </div>
                        </div>
                    </div>
                    <div class="tab tab2">
                        <p class="title">Расскажите о программе</p>

                        <div class="row tabs">
                            <div class="col-md-3 tab">
                                <p class="titl">Общая оценка <img alt="" src="/img/ico-tool.png" data-toggle="tooltip"
                                                                  data-placement="top"
                                                                  title="Отзывы о продукте помогают другим принимать правильные решения">
                                </p>
                                <div class="rating2" id="rating_common">
                                    <span data-star="5"></span>
                                    <span data-star="4"></span>
                                    <span data-star="3"></span>
                                    <span data-star="2"></span>
                                    <span data-star="1"></span>
                                </div>
                            </div>
                            <div class="col-md-3 tab">
                                <p class="titl">Удобство <img alt="" src="/img/ico-tool.png" data-toggle="tooltip"
                                                              data-placement="top"
                                                              title="Отзывы о продукте помогают другим принимать правильные решения">
                                </p>
                                <div class="rating2" id="rating_convenience">
                                    <span data-star="5"></span>
                                    <span data-star="4"></span>
                                    <span data-star="3"></span>
                                    <span data-star="2"></span>
                                    <span data-star="1"></span>
                                </div>
                            </div>
                            <div class="col-md-3 tab">
                                <p class="titl">Функционал <img alt="" src="/img/ico-tool.png" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Отзывы о продукте помогают другим принимать правильные решения">
                                </p>
                                <div class="rating2" id="rating_functions">
                                    <span data-star="5"></span>
                                    <span data-star="4"></span>
                                    <span data-star="3"></span>
                                    <span data-star="2"></span>
                                    <span data-star="1"></span>
                                </div>
                            </div>
                            <div class="col-md-3 tab">
                                <p class="titl">Служба поддержки <img alt="" src="/img/ico-tool.png"
                                                                      data-toggle="tooltip" data-placement="top"
                                                                      title="Отзывы о продукте помогают другим принимать правильные решения">
                                </p>
                                <div class="rating2" id="rating_support">
                                    <span data-star="5"></span>
                                    <span data-star="4"></span>
                                    <span data-star="3"></span>
                                    <span data-star="2"></span>
                                    <span data-star="1"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="pluses" placeholder="Достоинства, что вам понравилось?"><?= $model->pluses;?></textarea>
                            <textarea name="minuses"
                                      placeholder="Недостатки, что не оправдало ваши ожидания?"><?= $model->minuses;?></textarea>
                            <textarea name="common" placeholder="Общие впечатления"><?= $model->common;?></textarea>
                        </div>
                        <div class="nav_panel">
                            <p class="num_page">2/2</p>
                            <div class="bt">
                                <input type="button" class="btn btn-green bnt-more" value="Отправить"
                                       onclick="reviewSend('review_form')">
                            </div>
                        </div>
                    </div>


                    <input type="hidden" name="rating_common" value="<?= $model->rating_common;?>">
                    <input type="hidden" name="rating_convenience" value="<?= $model->rating_convenience;?>">
                    <input type="hidden" name="rating_functions" value="<?= $model->rating_functions;?>">
                    <input type="hidden" name="rating_support"  value="<?= $model->rating_support;?>">

                </form>
            </div>


        </div>
    </div>
<?

$js = <<<JS
	
		// Рейтинг, стр. отзывы
		$('.rating2 span').click( function(){
			var star = $(this).data('star');
			var id = $(this).parents('.rating2').attr('id');

			$('input[name="'+id+'"]').val(star);
			
			$('#'+id).children('span').removeClass('active');
			for(var i=1; i<=star; star--){
				var num = 6-star;
				$('#'+id).children('span:nth-child('+num+')').addClass('active');
			}
		});
		/****************************************************/
		
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip();
		});
JS;
Yii::$app->view->registerJs($js, \yii\web\View::POS_READY);
