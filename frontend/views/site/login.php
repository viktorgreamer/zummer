<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Авторизация';
?>

<div class="content">
    <div class="container">

        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Личный кабинет</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Авторизация</li>
                </ol>
            </nav>
        </div>


        <div class="main d-flex flex-column align-items-center">
            <div class="login_bl ">
                <div class="titl"><p><img alt="" src="img/icons/ico-cabinet.png"> Личный кабинет разработчика</p></div>
                <div class="row_forms">
                    <form class="">
                        <label>
                            <span>Логин:</span>
                            <input type="text" name="login" placeholder="Ваш логин">
                        </label>
                        <label>
                            <span>Пароль:</span>
                            <input type="password" name="password" placeholder="Ваш пароль">
                        </label>

                        <div class="check">
                            <label>
                                <input type="checkbox" name="remember" class="checkbox d-none">
                                <span class="checkbox__text">Запомнить меня</span>
                            </label>
                        </div>

                        <div class="bt">
                            <button type="button" class="btn btn-green bnt-more">Войти</button>
                        </div>
                        <div class="forget">
                            <a href="#">Забыли пароль или логин</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="login_warn ">
                <p>Нет аккаунта?<br>
                    Расскажите клиентам о своем сервисе на Zummer!</p>
                <div class="bt">
                    <a href="#" class="btn btn-green bnt-more">Зарегистрировать бесплатно</a>
                </div>
            </div>












        </div>
    </div>
</div>
