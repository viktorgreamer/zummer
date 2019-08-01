<?php


use common\models\Developers;
use yii\helpers\Url;

$name = '';
/** @var \common\models\User $user */
if ($user = Yii::$app->user->identity) {
    $name = $user->fullName();
    $billing = ($developer = Developers::findOne(['user_id' => $user->id]))?$developer->billing:'0';
}
/* @var \yii\web\View $this */
 ?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-4 col-md-3 logo">
                <a href="/"><img alt="" src="/img/logo.png"></a>
            </div>
            <div class="col-8 col-md-9 info">
                <div class="row">
                    <div class="d-none col-md-8 hy_user d-md-block col-lg-9 col-xl-10">
                        <p><img alt="" src="/img/icons/ico-cabinet.png"> Здравствуйте, <?= $name;?> </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-2 dropdown">
                        <a href="#" class="btn dropdown-toggle" id="settings" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><img alt="" src="/img/settings.png"> <span>Настройки</span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="settings">
                            <a class="dropdown-item" href="#">Счет: <?= $billing?:'0';?></a>
                            <a class="dropdown-item" href="<?= Url::to(['/developer/logout']);?>">Выход</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
