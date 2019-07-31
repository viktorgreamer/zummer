<?php

$name = '';
/** @var \common\models\User $user */
if ($user = Yii::$app->user->identity) {
    $name = $user->fullName();
}
/* @var \yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url; ?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-4 col-md-3 logo">
                <a href="/"><img alt="" src="/img/logo.png"></a>
            </div>
            <div class="col-8 col-md-9 info">
                <div class="row">
                    <div class="d-none col-md-8 hy_user d-md-block col-lg-9 col-xl-10">
                        <p><img alt="" src="/img/icons/ico-cabinet.png"> Здравствуйте, <?= $name;?></p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-2 dropdown">
                        <a href="#" class="btn dropdown-toggle" id="settings" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><img alt="" src="/img/settings.png"> <span>Настройки</span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="settings">
                            <a class="dropdown-item" href="<?= Url::to(['/developer/profile']);?>">Настройки профиля</a>
                            <a class="dropdown-item" href="<?= Url::to(['/developer/billing']);?>">Биллинг</a>
                            <a class="dropdown-item" href="<?= Url::to(['/developer/logout']);?>">Выход</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
