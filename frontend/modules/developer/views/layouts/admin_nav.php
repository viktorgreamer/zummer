<?php
use yii\helpers\Url;

?>



<div class="row row1">
    <div class="col-lg-6 col-xl-6 btns">
        <div class="row">
            <div class="col-6">
                <a class="tab active" href="<?= Url::to(['/developer/profile']);?>">
                    <div class="ico">
                        <img alt="" src="/img/icons/ico-cabinet.png">
                        <img alt="" class="active" src="/img/icons/ico-cabinet_hov.png">
                    </div>
                    <span>Ваш личный <br>кабинет <i></i></span>
                </a>
            </div>
            <div class="col-6">
                <a class="tab" href="#">
                    <div class="ico">
                        <img alt="" src="/img/icons/ico-ads.png">
                        <img alt="" class="active" src="/img/icons/ico-ads_hov.png">
                    </div>
                    <span>Ваши <br>объявления <i></i></span>
                </a>
            </div>
            <div class="col-6">
                <a class="tab" href="#">
                    <div class="ico">
                        <img alt="" src="/img/icons/ico-vallet.png">
                        <img alt="" class="active" src="/img/icons/ico-vallet_hov.png">
                    </div>
                    <span>Денежный <br>счет <i></i></span>
                </a>
            </div>
            <div class="col-6">
                <a class="tab" href="#">
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

