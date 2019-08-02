<?php

use yii\helpers\Html;
use yii\helpers\Url; ?>


<header>
    <div class="container">
        <div class="row">
            <div class="d-md-none menu">
                <nav class="navbar navbar-expand-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-main" aria-controls="nav-main" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="nav-main">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Категории программ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= Url::to(['/developers/']);?>">Разработчикам</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Центр знаний</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-4 order-md-1 logo">
                <a href="/"><img alt="" src="/img/logo.png"></a>
            </div>
            <? if (Yii::$app->user->isGuest) { ?>
                <div class="d-none col-md-8 order-md-2 login d-md-flex justify-content-end align-items-center">
                <span>Авторизоваться</span>
                <a href="/site/auth?authclient=vkontakte&scope=email"><img alt="" src="/img/icons/ico-vk_w.png"></a>
               <!-- <a href="/site/auth?authclient=google"><img alt="" src="/img/icons/ico-fb_w.png"></a>-->
                <a href="/site/auth?authclient=facebook"><img alt="" src="/img/icons/ico-fb_w.png"></a>
               </div>
            <? }  else {
                echo Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->email . ')',
                ['class' => 'btn btn-link logout']
                )
                . Html::endForm();
             } ?>

        </div>
    </div>
</header>

