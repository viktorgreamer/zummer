<?php
use yii\helpers\Url;

$route = \Yii::$app->controller->route;
Yii::error($route);
?>



<div class="row row1">
    <div class="col-lg-6 col-xl-6 btns">
        <div class="row">
            <div class="col-6">
                <a class="tab <?= $route=='developer/default/index'?"active":'';?>" href="<?= Url::to(['/developer']);?>">
                    <div class="ico">
                        <img alt="" src="/img/icons/ico-cabinet.png">
                        <img alt="" class="active" src="/img/icons/ico-cabinet_hov.png">
                    </div>
                    <span>Ваш личный <br>кабинет <i></i></span>
                </a>
            </div>
            <div class="col-6">
                <a class="tab <?= ($route=='developer/programs/create')||($route=='developer/programs/update')||($route=='developer/programs/view')?"active":'';?> " href="<?= Url::to(['/developer/programs/create']);?>">
                    <div class="ico">
                        <img alt="" src="/img/icons/ico-ads.png">
                        <img alt="" class="active" src="/img/icons/ico-ads_hov.png">
                    </div>
                    <span>Создать <br>объявление <i></i></span>
                </a>
            </div>
            <div class="col-6">
                <a class="tab <?= $route=='developer/profile/index'?"active":'';?>"   href="<?= Url::to(['/developer/profile/index']);?>">
                    <div class="ico">
                        <img alt="" src="/img/icons/ico-vallet.png">
                        <img alt="" class="active" src="/img/icons/ico-vallet_hov.png">
                    </div>
                    <span>Настройки <br>профиля <i></i></span>
                </a>
            </div>
            <div class="col-6">
                <a class="tab <?= $route=='developer/default/reviews'?"active":'';?>" href="<?= Url::to(['/developer/reviews']);?>">
                    <div class="ico">
                        <img alt="" src="/img/icons/ico-review.png">
                        <img alt="" class="active" src="/img/icons/ico-review_hov.png">
                    </div>
                    <span>Ваши <br>отзывы <i></i></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-6 admin_sl">
        <div class="owl-carousel admin_slider">
            <div class="item">
                <div class="tab">
                    <div class="text_bl">
                        <p class="titl">CRM-маркетинг</p>
                        <p>Персональные предложения под разные сегменты ваших клиентов усилят продажи.</p>
                        <div class="price">
                            7 990 <span><img alt="" src="/img/rub.png"></span>
                        </div>
                    </div>
                    <img alt="" class="d-none d-md-block img_sl" src="/img/bg_sl.png">
                </div>
            </div>
            <div class="item">
                <div class="tab">
                    <div class="text_bl">
                        <p class="titl">CRM-маркетинг</p>
                        <p>Персональные предложения под разные сегменты ваших клиентов усилят продажи.</p>
                        <div class="price">
                            7 990 <span><img alt="" src="/img/rub.png"></span>
                        </div>
                    </div>
                    <img alt="" class="d-none d-md-block img_sl" src="/img/bg_sl.png">
                </div>
            </div>
            <div class="item">
                <div class="tab">
                    <div class="text_bl">
                        <p class="titl">CRM-маркетинг</p>
                        <p>Персональные предложения под разные сегменты ваших клиентов усилят продажи.</p>
                        <div class="price">
                            7 990 <span><img alt="" src="/img/rub.png"></span>
                        </div>
                    </div>
                    <img alt="" class="d-none d-md-block img_sl" src="/img/bg_sl.png">
                </div>
            </div>
        </div>
    </div>
</div>

