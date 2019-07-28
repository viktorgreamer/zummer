<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\modules\developer\models\PasswordResetRequestForm */

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
                        <span>E-mail:</span>
                        <input type="email" name="email" placeholder="Ваш email" value="<?= $model->email; ?>">
                    </label>
                    <div class="bt">
                        <button type="button" class="btn btn-green bnt-more">Подтвердить</button>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
