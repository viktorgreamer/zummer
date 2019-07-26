<?php

use common\models\Categories;
use common\models\Programs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="content">
        <div class="container">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
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
                                <p>Битрикс24</p>
                                <img src="img/bitrix.png">
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
                            <a href="#" class="btn bnt-price"><span>+</span> Добавить продукт</a>
                        </div>
                        <div class="bt">
                            <a href="#" class="btn bnt-price">Обновить до максимум</a>
                        </div>
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
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                <div class="tab">
                                    <h3>Базовая информация</h3>

                                    <div class="row ">
                                        <div class="tab_l col-lg-6">
                                            <h4>Информация о передаче продуктов по умолчанию</h4>
                                            <h5>Длинное описание</h5>
                                            <p>Предустановленные группы, которые не нужно настраивать. К примеру,
                                                "клиенты без сделок" или "все лиды"</p>
                                            <h4>Короткое описание</h4>
                                            <p>Предустановленные группы, которые не нужно настраивать. К примеру,
                                                "клиенты без сделок" или "все лиды"</p>
                                        </div>
                                        <hr>
                                        <div class="tab_r col-lg-6">
                                            <div class="url">
                                                <h5>Целевой URL:</h5>
                                                <a href="#">https://www.wildberries.ru</a>
                                            </div>
                                            <div class="bt">
                                                <a class="btn btn-add" href="#">Изменить информацию</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="edit_inf d-none">
                                        <form>
                                            <div class="row">
                                                <div class="tab_l col-lg-6">
                                                    <h4>Информация о продукте по умолчанию</h4>
                                                    <label>
                                                        <h5>Длинное описание</h5>
                                                        <div class="text_count" data-count="500">
                                                            <textarea name="long_desc" placeholder=""
                                                                      class="send-txt"></textarea>
                                                            <p class="lineCount">(<span class="nowCount">0</span>/<span
                                                                        class="allCount">500</span> символов)</p>
                                                        </div>
                                                    </label>
                                                    <label>
                                                        <h5>Короткое описание</h5>
                                                        <div class="text_count" data-count="135">
                                                            <textarea name="long_desc" placeholder=""
                                                                      class="send-txt"></textarea>
                                                            <p class="lineCount">(<span class="nowCount">0</span>/<span
                                                                        class="allCount">135</span> символов)</p>
                                                        </div>
                                                    </label>
                                                </div>
                                                <hr>
                                                <div class="tab_r col-lg-6">
                                                    <label class="url input">
                                                        <h5>Целевой URL:</h5>
                                                        <input type="text" name="url">
                                                    </label>
                                                    <label>
                                                        <h5>Ссылка демо-версии</h5>
                                                        <input type="text" name="demo">
                                                    </label>
                                                    <h5>Акции</h5>
                                                    <div class="sale row">
                                                        <div class="col-7 sale_l">
                                                            <p>Название</p>
                                                            <input type="text" name="" placeholder="Скидка 50%">
                                                            <input type="text" name=""
                                                                   placeholder="В подарок онлайн запись">
                                                            <input type="text" name="" placeholder="1 месяц бесплатно">
                                                            <input type="text" name="" placeholder="Личное обучение">
                                                        </div>
                                                        <div class="col-5 sale_r">
                                                            <p>Ссылка</p>
                                                            <input type="text" name="">
                                                            <input type="text" name="">
                                                            <input type="text" name="">
                                                            <input type="text" name="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btns">
                                                <div class="bt">
                                                    <button class="btn btn-remove" href="#">Отмена</button>
                                                </div>
                                                <div class="bt">
                                                    <button class="btn btn-add" href="#">Сохранить информацию</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tariff d-none d-lg-block">
                                    <table class="table">
                                        <tr>
                                            <th>Тариф</th>
                                            <th>Категория</th>
                                            <th>Название</th>
                                        </tr>
                                        <tr>
                                            <td>Базовый</td>
                                            <td><a href="#">Управление персоналом через CRM</a></td>
                                            <td>Битрикс24</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane" id="tab2" role="tabpanel">
                                <div class="tab variants">
                                    <h3>Информация о продукте</h3>

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-4 tab_var">
                                            <h4>Платформы</h4>
                                            <p class="titl_gr">Выберите все подходящие варианты</p>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Облако, Saas, Интернет</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Установлено - Windows</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Установлено - Mac</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Мобильный - iOS Native</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Мобильный - Android Native</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 tab_var">
                                            <h4>Служба поддержки</h4>
                                            <p class="titl_gr">Выберите все подходящие варианты</p>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">24/7 (круглосуточная работа)</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Рабочее время</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Онлайн</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Отсутствует</span>
                                            </label>
                                            <h6>Стоимость поддержки</h6>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Включено с покупкой</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Дополнительная плата / премиум доступы</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 tab_var">
                                            <h4>Пробная / Демо-версия</h4>

                                            <h6>Бесплатная пробная версия?</h6>
                                            <div class="radio_bl">
                                                <label class="radio">
                                                    <input type="radio" name="demo" checked/>
                                                    <div class="radio__text">Да</div>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="demo"/>
                                                    <div class="radio__text">Нет</div>
                                                </label>
                                            </div>
                                            <h6>Параметры демонстрации</h6>
                                            <p class="titl_gr">Выберите все подходящие варианты</p>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Персонально с менеджером</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Самостоятельная</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Видеопрезентация</span>
                                            </label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-4 tab_var">
                                            <h4>Цены</h4>

                                            <h6>Бесплатная версия?</h6>
                                            <div class="radio_bl">
                                                <label class="radio">
                                                    <input type="radio" name="free" checked/>
                                                    <div class="radio__text">Да</div>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="free"/>
                                                    <div class="radio__text">Нет</div>
                                                </label>
                                            </div>

                                            <label>
                                                <h6>Начальная цена <span>(самая низкая)</span></h6>
                                                <input class="start_price" type="text" name="" placeholder="1 000"> руб.
                                            </label>

                                            <h6>Эта цена</h6>
                                            <div class="radio_bl">
                                                <label class="radio d-block">
                                                    <input type="radio" name="free" checked/>
                                                    <div class="radio__text">Единоразово</div>
                                                </label>
                                                <label class="radio d-block">
                                                    <input type="radio" name="free"/>
                                                    <div class="radio__text">В месяц</div>
                                                </label>
                                                <label class="radio d-block">
                                                    <input type="radio" name="free"/>
                                                    <div class="radio__text">В год</div>
                                                </label>
                                            </div>

                                            <h6>На пользователя</h6>
                                            <div class="radio_bl">
                                                <label class="radio">
                                                    <input type="radio" name="free" checked/>
                                                    <div class="radio__text">Да</div>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="free"/>
                                                    <div class="radio__text">Нет</div>
                                                </label>
                                            </div>


                                            <label>
                                                <h6>Информация о ценах</h6>
                                                <div class="text_count">
                                                    <textarea name="long_desc" placeholder=""
                                                              class="send-txt"></textarea>
                                                    <p class="lineCount">(<span class="nowCount">0</span>/<span
                                                                class="allCount">75</span> символов)</p>
                                                </div>
                                            </label>

                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text"><b>Не отображать цены</b></span>
                                            </label>

                                        </div>
                                        <div class="col-lg-6 col-xl-8 tab_var">
                                            <h4>Обучение</h4>
                                            <h6>Варианты обучения:</h6>
                                            <p class="titl_gr">Выберите все подходящие варианты</p>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Лично сменеджером</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Онлайн</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Вебинары</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Документация</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Отсутствует</span>
                                            </label>

                                            <h6>Стоимость обучения:</h6>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Включено с покупкой</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">Дополнительная плата / премиум доступы</span>
                                            </label>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4>Целевая аудитория</h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-4">
                                            <h5>Размер штата у клиента (сотрудников)</h5>
                                            <p class="titl_gr">Выберите все подходящие варианты</p>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">1</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">2-9</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">10-49</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">50-99</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">100-499</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">500-999</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" name="" class="checkbox d-none">
                                                <span class="checkbox__text">1000+</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-xl-8">
                                            <h5>Для кого ваш продукт?</h5>
                                            <h6>Опишите ваш целевой рынок</h6>
                                            <div class="text_count" data-count="500">
                                                <textarea name="long_desc" placeholder="" class="send-txt"></textarea>
                                                <p class="lineCount">(<span class="nowCount">0</span>/<span
                                                            class="allCount">500</span> символов)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="btns">
                                        <div class="bt">
                                            <button class="btn btn-add" href="#">Сохранить информацию</button>
                                        </div>
                                        <div class="bt">
                                            <button class="btn btn-remove" href="#">Отмена</button>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="tab-pane" id="tab3" role="tabpanel">
                                <div class="tab specifications">
                                    <h3>Характеристики</h3>
                                    <h5>Отметьте функции, реализованные в вашем продукте</h5>

                                    <div class="fl personal">
                                        <div class="titl"><a data-toggle="collapse" href="#personal" role="button"
                                                             aria-expanded="true" class="active">Управление персоналом
                                                посредством CRM <img alt="" src="/img/arr_fl.png"></a></div>
                                        <div class="input collapse show" id="personal" style="">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Управление претензиями</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">EMR / EHR</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Проверка права на страхование</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Multi-офис</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Биллинг пациента</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Записи пациентов</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Планирование пациента</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">E-прописывания</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Соответствует HIPAA</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Управление ...</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Multi-врач</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Портал для пациентов</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Регистрация пациентов</span>
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" name="" class="checkbox d-none">
                                                        <span class="checkbox__text">Планирование врача</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="btns">
                                                <div class="bt">
                                                    <button class="btn btn-add" href="#">Сохранить информацию</button>
                                                </div>
                                                <div class="bt">
                                                    <button class="btn btn-remove" href="#">Отмена</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="tab-pane" id="tab4" role="tabpanel">
                                <div class="tab photo">
                                    <h3>Добавить фото, видео</h3>
                                    <div class="row">
                                        <div class="col-lg-8 interface">
                                            <div class="title_line">
                                                <p>Битрикс 24 | Интерфейс</p>
                                            </div>
                                            <div class="tabs_ph">
                                                <div class="tab_ph video flex-lg-fill"><a class="close" href="#"><img
                                                                src="img/close.png"></a>

                                                </div>
                                                <div class="tab_ph flex-lg-fill"><a class="close" href="#"><img
                                                                src="img/close.png"></a>

                                                </div>
                                                <div class="tab_ph flex-lg-fill"><a class="close" href="#"><img
                                                                src="img/close.png"></a>

                                                </div>
                                                <div class="tab_ph flex-lg-fill"><a class="close" href="#"><img
                                                                src="img/close.png"></a>

                                                </div>
                                                <div class="tab_ph flex-lg-fill"><a class="close" href="#"><img
                                                                src="img/close.png"></a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 awards">
                                            <div class="title_line">
                                                <p>Награды</p>
                                            </div>
                                            <div class="tabs">
                                                <div class="tab_ph"><a class="close" href="#">x</a>

                                                </div>
                                                <div class="tab_ph"><a class="close" href="#">x</a>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>

                                    <h5>Загрузить скриншот</h5>
                                    <div class="row">
                                        <div class="col-lg-7 col-xl-7">
                                            <div class="box">
                                                <input type="file" name="file-7[]" id="file-7"
                                                       class="inputfile inputfile-6"
                                                       data-multiple-caption="{count} files selected" multiple="">
                                                <label for="file-7"><span></span> <strong>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                             viewBox="0 0 20 17">
                                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                        </svg>
                                                        Выберите файл</strong></label>
                                                <p class="podp">Поддерживаются PNS, JPG < 1MB</p>
                                            </div>
                                            <div class="btns">
                                                <div class="bt">
                                                    <button class="btn btn-add" href="#">Загрузить</button>
                                                </div>
                                                <div class="bt">
                                                    <button class="btn btn-remove" href="#">Отменить</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-xl-5 d-none d-lg-block">
                                            <div class="view embed-responsive embed-responsive-16by9">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="programs-form">

        <?php $form = ActiveForm::begin([
            'enableClientValidation' => false,
            'options' => [
                'enctype' => 'multipart/form-data',
            ],
        ]); ?>

        <div class="row">
            <div class="col-lg-3">
                <?= $form->field($model, 'category_id')->dropDownList(Categories::map()) ?>

            </div>

            <div class="col-lg-3">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'destination')->textarea(['rows' => 6]) ?>
            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'support_map')->checkboxList(Programs::mapSupport()) ?>

            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'learning_map')->checkboxList(Programs::mapLearning()) ?>

            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'platforms')->checkboxList(\common\models\Platforms::map()) ?>

            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'functions')->checkboxList(\common\models\Functions::map()) ?>

            </div>

            <div class="col-lg-2">
                <?= $form->field($model, 'price_from')->textInput() ?>

            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'price_to')->textInput() ?>

            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'has_month_plan')->checkbox() ?>

                <?= $form->field($model, 'has_year_plan')->checkbox() ?>

                <?= $form->field($model, 'has_free')->checkbox() ?>

                <?= $form->field($model, 'has_trial')->checkbox() ?>

            </div>

            <div class="col-lg-6">
                <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true]) ?>
            </div>
        </div>
        <? //  echo $form->field($model, 'prices')->textarea(['rows' => 6]) ?>

        <div class="col-lg-6">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

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
						fileName = e.target.value.split('\\').pop();

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
Yii::$app->view->registerJs($js, 4);