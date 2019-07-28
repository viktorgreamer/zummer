<?php

/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

use common\models\Categories;
use frontend\modules\developer\models\DevelopersRegistrationForm;
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $model DevelopersRegistrationForm \ */

$this->title = 'Регистрация';
?>
<div class="content">
    <div class="container">

        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="<?= Url::to(['/developer']);?>">Личный кабинет</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
                </ol>
            </nav>
        </div>

        <div class="main">

            <div class="title_bl">
                <h1 class="title">Регистрация</h1>
                <p>Опубликуйте бесплатно информацию о вашем сервисе/программе для бизнеса.<br>
                    Получайте больше клиентов с помощью Zummer</p>
            </div>
            <?php if ($model->errors) {
                foreach ($model->errors as $error) {
                    foreach ($error as $item) {
                        echo Html::tag('div', $item, ['class' => 'alert alert-danger', 'role' => 'alert']);
                    }

                }
            }
            ?>
            <div class="row_forms">
                <form action="<?= Url::to(['default/registration']); ?>" method="post">

                    <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>

                    <div class="tab">
                        <p><b>Расскажите о вашей компании</b></p>
                        <label>
                            <span>Имя:</span>
                            <input type="text" name="first_name" placeholder="Имя" value="<?= $model->first_name; ?>">
                        </label>
                        <label>
                            <span>Фамилия:</span>
                            <input type="text" name="last_name" placeholder="Фамилия" value="<?= $model->last_name; ?>">
                        </label>
                        <label>
                            <span>E-mail:</span>
                            <input type="email" name="email" placeholder="E-mail" value="<?= $model->email; ?>">

                        </label>
                        <label>
                            <span>Пароль:</span>
                            <input type="password" name="password" placeholder="Пароль">
                        </label>
                        <label>
                            <span>Телефон:</span>
                            <input type="text" name="phone" placeholder="Телефон" value="<?= $model->phone; ?>">
                        </label>
                        <label>
                            <span>Сайт:</span>
                            <input type="text" name="site" placeholder="Адрес сайта" value="<?= $model->site; ?>">
                        </label>
                    </div>

                    <div class="tab">
                        <p><b>Информация о сервисе / программе</b></p>
                        <label>
                            <span>Название продукта:</span>
                            <input type="text" name="program_name" placeholder="Название продукта"
                                   value="<?= $model->program_name; ?>">
                        </label>
                        <label>
                            <span>Категория продукта:</span>
                            <select name="category">
                                <? foreach (Categories::map() as $key => $category) { ?>
                                    <option value="<?= $key; ?>" <?= $model->program_category_id == $key ? 'checked' : '' ?>><?= $category; ?></option>
                                <? } ?>
                            </select>
                        </label>
                        <label>
                            <span>Описание продукта:</span>
                            <input type="text" name="program_description" placeholder="Описание продукта"
                                   value="<?= $model->program_description; ?>">
                        </label>
                        <label>
                            <span>Телефон:</span>
                            <input type="text" name="program_phone" placeholder="Телефон"
                                   value="<?= $model->program_phone; ?>">
                        </label>
                        <label>
                            <span>Сайт:</span>
                            <input type="text" name="program_site" placeholder="Адрес сайта"
                                   value="<?= $model->program_site; ?>">
                        </label>
                    </div>

                    <div class="tab">
                        <p><b>Получите максимум от рекламных возможностей Zummer</b></p>
                        <label>
                            <input type="checkbox" name="marketing_interested"
                                   class="checkbox d-none" <?= $model->marketing_interested ? 'checked' : '' ?>
                                   value="1">
                            <span class="checkbox__text">Интересно узнать больше о привлечении клиентов в мой продукт</span>
                        </label>
                        <label>
                            <input type="checkbox" name="lead_generation_interested"
                                   class="checkbox d-none" <?= $model->lead_generation_interested ? 'checked' : '' ?>
                                   value="1">
                            <span class="checkbox__text">Интересно пообщаться для бесплатного обзора рекламных возможностей Zummer</span>
                        </label>
                    </div>

                    <div class="bt">
                        <button type="submit" class="btn btn-green bnt-more">Регистрация</button>
                    </div>

                    <div class="questions_bl">
                        <p class="title">Остались вопросы?</p>
                        <p>Позвоните нам 8 800 655-35-87, ждем писем на zummer@mail.ru<br>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



