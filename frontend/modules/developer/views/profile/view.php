<?php

use common\models\Developers;
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Developers */
/* @var $user common\models\User */

?>
    <div class="content">
        <div class="container">

            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Личный кабинет</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Профиль</li>
                    </ol>
                </nav>
            </div>

            <div class="main">
                <?= $this->render('../layouts/admin_nav'); ?>

                <div class="row row2">
                    <?= $this->render('../layouts/manager'); ?>
                    <div class="col-md-7 order-md-1 col-lg-8 profile">
                        <p class="title">Профиль компании</p>
                        <div class="tab">
                            <div class="row">
                                <div class="img col-lg-8 col-xl-4 d-lg-flex align-items-start flex-column">
                                    <img alt="" src="<?= $model->getLogo(); ?>">
                                    <form method="post" id="logo-form" enctype='multipart/form-data' action="<?= Url::to(['/developer/profile/upload-logo', 'id' => $model->id]); ?>">
                                        <? echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                                        <label for="file-upload" class="custom-file-upload">
                                            <img alt="" src="/img/upload.png"" > <span>
                                            <? if ($model->logo) echo "Обновить"; else echo "Загрузить"; ?> логотип</span>
                                        </label>
                                        <input class="d-none" id="file-upload" type="file"
                                               name="Developers[imageUpload]"/>
                                    </form>
                                </div>
                                <div class="tariffs col-lg-4 col-xl-8">
                                    <div class="tariff">
                                        <p class="titl">Тариф Максимум</p>
                                        <div class="activated no">
                                            Не активирован
                                        </div>
                                        <div class="bt">
                                            <a href="#" class="btn btn-add">+ Добавить</a>
                                        </div>
                                    </div>
                                    <div class="tariff">
                                        <p class="titl">Тариф Базовый</p>
                                        <div class="activated yes">
                                            Активирован
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row_forms">
                    <form method="post" action="<?= Url::to(['/developer/profile/update', 'id' => $model->id]); ?>">

                        <? echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                        <p class="title">Контакты профиля</p>
                        <div class="tab">
                            <div class="text">
                                <p>Эта информация нигде не публикуется.<br>
                                    Необходимо исключительно для связи с личным менеджером Zummer</p>
                            </div>
                            <label>
                                <span>Имя:</span>
                                <input type="text" name="UpdateUserForm[first_name]" placeholder="Имя"
                                       value="<?= $user->first_name; ?>">
                            </label>
                            <label>
                                <span>Фамилия:</span>
                                <input type="text" name="UpdateUserForm[last_name]" placeholder="Фамилия"
                                       value="<?= $user->last_name; ?>">
                            </label>
                            <label>
                                <span>E-mail:</span>
                                <input type="text" name="Developers[email]" placeholder="E-mail"
                                       value="<?= $model->email; ?>">
                            </label>
                            <label>
                                <span>Телефон:</span>
                                <input type="text" name="Developers[phone]" placeholder="Телефон"
                                       value="<?= $model->phone; ?>">
                            </label>
                            <label>
                                <span>Адрес1:</span>
                                <input type="text" name="Developers[address1]" placeholder="Адрес1"
                                       value="<?= $model->address2; ?>">
                            </label>
                            <label>
                                <span>Адрес2:</span>
                                <input type="text" name="Developers[address1]" placeholder="Адрес2"
                                       value="<?= $model->address1; ?>">
                            </label>

                            <label>
                                <span>Страна:</span>
                                <select name="Developers[country]">
                                    <?php foreach (Developers::countries() as $country) { ?>
                                        <option <?php if ($model->country == $country) echo "selected"; ?>><?= $country; ?></option>

                                    <? } ?>
                                </select>

                            </label>

                            <label>
                                <span>Город:</span>
                                <input type="text" name="Developers[city]" placeholder="Город"
                                       value="<?= $model->city; ?>">
                            </label>
                            <label>
                                <span>Почтовый индекс:</span>
                                <input type="text" name="Developers[postcode]" placeholder="Почтовый индекс"
                                       value="<?= $model->postcode; ?>">
                            </label>
                        </div>

                        <p class="title">Информация о компании</p>
                        <div class="tab">
                            <label>
                                <span>Год основания:</span>
                                <input type="text" name="Developers[foundation_year]" placeholder="Год основания"
                                       value="<?= $model->foundation_year; ?>">
                            </label>
                            <label>
                                <span>Адрес офиса:</span>
                                <select name="Developers[office_country]">
                                    <?php foreach (Developers::countries() as $country) { ?>
                                        <option <?php if ($model->office_country == $country) echo "selected"; ?>><?= $country; ?></option>

                                    <? } ?>
                                </select>
                            </label>
                        </div>

                        <div class="bt">
                            <button type="submit" class="btn btn-green bnt-more">Подтвердить</button>
                        </div>
                    </form>
                </div>

                <div class="row_forms">
                    <form method="post" action="<?= Url::to(['/developer/profile/update-awards', 'id' => $model->id]); ?>">
                        <? echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                        <p class="title">Награды</p>
                        <div class="tab">
                            <div class="row">

                            </div>
                            <label>
                                <span>Описание:</span>
                                <input type="text" name="DevelopersAwardsImages[description]" placeholder="Описание"
                                       value="<?= $user->first_name; ?>">
                            </label>
                            <label>
                                <span>Фамилия:</span>
                                <input type="text" name="DevelopersAwardsImages[last_name]" placeholder="Фамилия"
                                       value="<?= $user->last_name; ?>">
                            </label>
                        </div>
                        <div class="bt">
                            <button type="submit" class="btn btn-green bnt-more"></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?

$js = <<<JS
 $("#file-upload").change(function (){
      $('#logo-form').submit();
 });
JS;

$this->registerJs($js, 4);
