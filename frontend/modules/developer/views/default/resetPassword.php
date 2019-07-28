<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\modules\developer\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Запрос на восстановление пароля.';
?>

<div class="content">
    <div class="container">

        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Личный кабинет</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Запрос на восстановление пароля.</li>
                </ol>
            </nav>
        </div>


        <div class="main d-flex flex-column align-items-center">
            <div class="login_bl ">
                <div class="titl"><p><img alt="" src="img/icons/ico-cabinet.png"> Запрос на восстановление пароля.</p>
                </div>
                <div class="row_forms">

                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>


                    <label>
                        <span>Пароль:</span>
                        <input type="password" name="password" placeholder="Введите пароль" value="<?= $model->password;?>">
                    </label>

                    <?= Html::activeInput('email', $model, 'email'); ?>

                    <div class="bt">
                        <button type="button" class="btn btn-green bnt-more">Сохранить</button>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
