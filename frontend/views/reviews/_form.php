<?php
?>


    <div class="content container">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Написать отзыв</li>
                </ol>
            </nav>
        </div>


        <div class="main">
            <div class="title_bl">
                <h1 class="title">Написать отзыв о «Nextal»</h1>
                <p>Покупатели программ нуждаются в вашей помощи! Отзывы о продукте помогают другим принимать правильные
                    решения. Не уверены как написать отзыв? Следуйте <a href="#" target="_blank">рекоммендациям</a></p>
            </div>

            <div class="login_mob d-md-none">
                <p>Авторизоваться</p>
                <a class="twitter" href="#"><img alt="" src="/img/icons/ico-tv.png"></a>
                <a href="#"><img alt="" src="/img/icons/ico-vk.png"></a>
                <a href="#"><img alt="" src="/img/icons/ico-fb.png"></a>
                <a href="#"><img alt="" src="/img/icons/ico-inst.png"></a>
                <a href="#"><img alt="" src="/img/icons/ico-ok.png"></a>
            </div>


            <div class="review_form">
                <form id="review_form">
                    <div class="tab tab1">
                        <p class="title">Представьтесь, пожалуйста</p>
                        <div class="form-group d-md-flex flex-wrap justify-content-center">
                            <input type="text" name="firstName" placeholder="Ваше имя *">
                            <input type="text" name="lastName" placeholder="Фамилия *">
                            <input type="text" name="industryPr" placeholder="Отрасль вашего бизнеса">
                            <input type="text" name="position" placeholder="Должность *">
                            <input type="text" name="email" placeholder="E-mail *">
                            <input type="text" name="time" placeholder="Как долго пользуетесь? *">
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
                                <div class="rating2" id="allRating">
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
                                <div class="rating2" id="convenienceRating">
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
                                <div class="rating2" id="functionRating">
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
                                <div class="rating2" id="supportRating">
                                    <span data-star="5"></span>
                                    <span data-star="4"></span>
                                    <span data-star="3"></span>
                                    <span data-star="2"></span>
                                    <span data-star="1"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="virtues" placeholder="Достоинства, что вам понравилось?"></textarea>
                            <textarea name="disadvantages"
                                      placeholder="Недостатки, что не оправдло ваши ожидания?"></textarea>
                            <textarea name="impressions" placeholder="Общие впечатления"></textarea>
                        </div>
                        <div class="nav_panel">
                            <p class="num_page">2/2</p>
                            <div class="bt">
                                <input type="button" class="btn btn-green bnt-more" value="Отправить"
                                       onclick="reviewSend('review_form')">
                            </div>
                        </div>
                    </div>


                    <input type="hidden" name="allRating" value="0">
                    <input type="hidden" name="convenienceRating" value="0">
                    <input type="hidden" name="functionRating" value="0">
                    <input type="hidden" name="supportRating" value="0">

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
