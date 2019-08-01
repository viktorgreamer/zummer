<?php

/** @var \yii\web\View $this */

/** @var \frontend\modules\developer\models\ConsultationRequestForm $model */

use yii\helpers\Html;
use yii\helpers\Url; ?>


    <div class="content">
        <div class="container">

            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Разработчикам</li>
                    </ol>
                </nav>
            </div>


            <div class="main">
                <div class="title_bl">
                    <h1 class="title">Разработчикам</h1>
                    <p>Каждый день более 5 000 покупателей программного обеспечения используют «ZUMMER» выбирая продукт
                        для автоматизации своего бизнеса. С помощью расширенного функционала вы сможете масштабировать
                        бизнес,увеличив поток целевых клиентов.</p>
                </div>


                <div class="preim">
                    <p class="title">Наши преимущества</p>
                    <div class="row">
                        <div class="col-xl-6 order-md-2 order-xl-1">

                            <div class="row tabs">
                                <div class="col-6 tab">
                                    <div class="ico"><img alt="" src="/img/icons/ico-program.png"></div>
                                    <p class="titl">Более 2000 программ</p>
                                    <p>У нас вы найдете большое количество систем, под самый разный бизнес</p>
                                </div>
                                <div class="col-6 tab">
                                    <div class="ico"><img alt="" src="/img/icons/ico-review.png"></div>
                                    <p class="titl">+ 370 000 отзывов</p>
                                    <p>Не можете выбрать программу читайте реальные отзывы клиентов</p>
                                </div>
                                <div class="col-6 tab">
                                    <div class="ico"><img alt="" src="/img/icons/ico-vallet.png"></div>
                                    <p class="titl">Повысьте продажи</p>
                                    <p>CRM-маркетинг усиливает конверсию и повышает повторные продажи</p>
                                </div>
                                <div class="col-6 tab">
                                    <div class="ico"><img alt="" src="/img/icons/ico-manager.png"></div>
                                    <p class="titl">Онлайн поддержка</p>
                                    <p>Наши менеджеры с удовольствием ответят на все ваши вопросы</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 order-md-1 order-xl-2">
                            <div class="video">
                                <a data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" data-width="800"
                                   data-height="450" title="Смотреть видео">
                                    <div class="img"><img alt="" src="/img/video_test.jpg"></div>
                                    <div class="play">
                                        <div class="circlephone" style="transform-origin: center;"></div>
                                        <div class="circle-fill" style="transform-origin: center;"></div>
                                        <div class="img-circle" style="transform-origin: center;">
                                            <div class="img-circleblock" style="transform-origin: center;"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <? if (Yii::$app->user->isGuest) { ?>
            <div class="row text-center">
                <div class="center" style="margin: 0 auto;width: 80%;">
                    <p style="alignment: center"> Уже зарегистрированы? <a href="<?= Url::to(['/developer/login']); ?>">Войдите в личный
                            кабинет. </a></p>

                </div>
            </div>
        <? } ?>

        <? if (Yii::$app->user->identity && (Yii::$app->user->identity->developer)) { ?>
            <div class="row text-center">
                <div class="center" style="margin: 0 auto;width: 80%;">
                    <p style="alignment: center"> Уже зарегистрированы? <a href="<?= Url::to(['/developer']); ?>">Войдите в личный
                            кабинет. </a></p>
                </div>
            </div>
        <? } ?>


        <div class="learn_more">
            <div class="container">
                <p class="titl">Узнайте больше о рекламных возможностях «ZUMMER»</p>
                <p class="podp">Получите консультацию, как начать эффективную маркейтинговую кампанию с оптимальным
                    бюджетом.</p>
                <?php if ($model->isOk) { ?>
                    <span class="alert alert-success">Ваш запрос успешно отправлен.</span>
                <? } ?>
                <form method="post">
                    <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>

                    <div class="form-group d-none d-md-block">
                        <div class="tab">
                            <input type="text" name="first_name" placeholder="Имя" value="<?= $model->first_name; ?>">
                            <input type="text" name="last_name" placeholder="Фамилия" value="<?= $model->last_name; ?>">
                            <input type="text" name="phone" placeholder="Номер телефона" value="<?= $model->phone; ?>">
                        </div>
                        <div class="tab">
                            <input type="text" name="email" placeholder="E-mail" value="<?= $model->first_name; ?>">
                            <input type="text" name="program_industry" placeholder="Отрасль программы"
                                   value="<?= $model->program_industry; ?>">
                            <input type="text" name="site" placeholder="Веб-сайт" value="<?= $model->site; ?>">
                        </div>
                    </div>
                    <div class="btns">
                        <div class="bt bt1">
                            <button type="submit" class="btn btn-green bnt-more d-none d-md-block">получить
                                консультацию
                            </button>
                            <a href="#" class="btn btn-green bnt-more d-md-none" data-toggle="modal"
                               data-target="#advice">получить консультацию</a>
                        </div>
                        <span>или</span>
                        <div class="bt bt2">
                            <a href="<?= Url::to(['/developer/registration']); ?>" class="btn btn-single">Самостоятельно
                                опубликуй<br>информацию о продукте</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="schedule container">
            <div class="row">
                <div class="col-md-8 tab_table">
                    <table>
                        <tr>
                            <th></th>
                            <th>Новичок</th>
                            <th>Профи</th>
                        </tr>
                        <tr>
                            <td><p>Членство в сообществе более 35 000 софтверных компаний</p></td>
                            <td><img alt="" src="/img/ok_red.png"></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                        <tr>
                            <td><p>Подробный профиль продукта - целевой рынок, функции</p></td>
                            <td><img alt="" src="/img/ok_red.png"></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                        <tr>
                            <td><p>Видны миллионам покупателей программного обеспечения</p></td>
                            <td><img alt="" src="/img/ok_red.png"></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                        <tr>
                            <td><p>Персональный обзор сайта</p></td>
                            <td><img alt="" src="/img/ok_red.png"></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                        <tr>
                            <td><p>Отзывы о продукции и рейтинги</p></td>
                            <td><img alt="" src="/img/ok_red.png"></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                        <tr>
                            <td><p>Портал управления листингом</p></td>
                            <td><img alt="" src="/img/ok_red.png"></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                        <tr>
                            <td><p>Премиум размещение в каталоге программного обеспечения</p></td>
                            <td></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                        <tr>
                            <td><p>Несколько ссылок на ваш сайт / целевую страницу</p></td>
                            <td></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                        <tr>
                            <td><p>Доступ к выделенному менеджеру аккаунта</p></td>
                            <td></td>
                            <td><img alt="" src="/img/ok_green.png"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4 graphics">
                    <div class="customers">
                        <p class="titl">Рост клиентов</p>
                        <img alt="" src="/img/customers.png">
                    </div>
                    <div class="geography">
                        <p class="titl">Рост географий</p>
                        <img alt="" src="/img/geography.png">
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="questions_bl">
                <p class="title">Остались вопросы?</p>
                <p>Позвоните нам 8 800 655-35-87, ждем писем на zummer@mail.ru<br>
                    Или получите консультацию с планом продвижения</p>
                <div class="bt">
                    <a href="#" class="btn btn-green btn-more" data-toggle="modal" data-target="#advice">Получить
                        консультацию</a>
                </div>


            </div>
        </div>


        <div class="reviews">
            <img alt="" class="quotes" src="/img/quotes.png">
            <div class="reviews_over">
                <div class="container">
                    <div class="title_bl">

                        <p class="title">Отзывы клиентов</p>
                        <div class="info d-none d-md-block">
                            Мы предлагаем качественные продукты
                            а лучшее подтверждение этому -
                            отзывы довольных клиентов
                        </div>
                    </div>

                    <div class="owl-carousel reviews_sl">
                        <div class="item">
                            <div class="tab">
                                <div class="img">
                                    <span class="vk"><img alt="" src="/img/ico-rev_vk.png"></span>
                                    <img alt="" src="/img/men-test.jpg">
                                </div>
                                <p class="titl">Салтыков Алексей</p>
                                <p>«Битрикс24» простая, удобная и недорогая программа - все, что нужно для малого
                                    бизнеса! Есть много фишек которых нет в других CRM.</p>
                                <div class="rating">
                                    <div class="stars">
                                        <span data-star="5"></span>
                                        <span data-star="4"></span>
                                        <span data-star="3"></span>
                                        <span data-star="2"></span>
                                        <span data-star="1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="tab">
                                <div class="img">
                                    <span class="vk"><img alt="" src="/img/ico-rev_vk.png"></span>
                                    <img alt="" src="/img/men-test.jpg">
                                </div>
                                <p class="titl">Салтыков Алексей</p>
                                <p>«Битрикс24» простая, удобная и недорогая программа - все, что нужно для малого
                                    бизнеса! Есть много фишек которых нет в других CRM.</p>

                                <div class="rating">
                                    <div class="stars">
                                        <span data-star="5"></span>
                                        <span data-star="4"></span>
                                        <span data-star="3"></span>
                                        <span data-star="2"></span>
                                        <span data-star="1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="tab">
                                <div class="img">
                                    <span class="vk"><img alt="" src="/img/ico-rev_vk.png"></span>
                                    <img alt="" src="/img/men-test.jpg">
                                </div>
                                <p class="titl">Салтыков Алексей</p>
                                <p>«Битрикс24» простая, удобная и недорогая программа - все, что нужно для малого
                                    бизнеса! Есть много фишек которых нет в других CRM.</p>

                                <div class="rating">
                                    <div class="stars">
                                        <span data-star="5"></span>
                                        <span data-star="4"></span>
                                        <span data-star="3"></span>
                                        <span data-star="2"></span>
                                        <span data-star="1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="tab">
                                <div class="img">
                                    <span class="vk"><img alt="" src="/img/ico-rev_vk.png"></span>
                                    <img alt="" src="/img/men-test.jpg">
                                </div>
                                <p class="titl">Салтыков Алексей</p>
                                <p>«Битрикс24» простая, удобная и недорогая программа - все, что нужно для малого
                                    бизнеса! Есть много фишек которых нет в других CRM.</p>

                                <div class="rating">
                                    <div class="stars">
                                        <span data-star="5"></span>
                                        <span data-star="4"></span>
                                        <span data-star="3"></span>
                                        <span data-star="2"></span>
                                        <span data-star="1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="advice" tabindex="-1" role="dialog" aria-labelledby="advice" aria-hidden="true">
        <div class="modal-dialog advice_form modal-dialog-centered" role="document">
            <div class="modal-content ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <p class="modal-title">Консультация специалиста</p>
                <p class="podp">Расскажите несколько слов о себе, чтобы мы быстрее смогли Вам помочь.</p>

                <form id="advice_form" method="post">
                    <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                    <div class="form-group">
                        <label>
                            Ваше имя
                            <input type="text" name="first_name" class="form-control" value="<?= $model->first_name; ?>"
                                   placeholder="Пожалуйста представьтесь *">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Электронная почта
                            <input type="text" name="email" class="form-control email" value="<?= $model->email; ?>"
                                   placeholder="Введите email для связи *">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Телефон
                            <input type="text" name="phone" class="form-control" placeholder="Введите номер телефона *"
                                   value="<?= $model->phone; ?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Комментарий
                            <textarea name="body" class="form-control"
                                      placeholder="Ваше сообщение или вопросы"></textarea>
                        </label>
                    </div>
                    <div class="bt">
                        <button type="submit" class="btn btn-green btn-more">Получить консультацию
                        </button>
                    </div>
                    <div class="politic">
                        <p>Нажимая на кнопку вы даете соглашение на обработку <a href="#">персональных данных</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?
$js = <<<JS
// Карусель "Отзывы"
			$('.reviews_sl').owlCarousel({
				loop:true,
				center: true,
				
				margin:30,
				nav:true,
				navText: false,
				dots: true,
				items:2,
				responsive:{
					0:{
						items:1
					},
					480:{
						items:1,
						
					},
					767:{
						autoWidth:true,
						items:2
					},
					992:{
						items:2,
						autoWidth:true,
					},
					1300:{
						items:3,
						autoWidth:true,
					}
				}
			});
			/****************************************************/
			
JS;

$this->registerJs($js, 4);