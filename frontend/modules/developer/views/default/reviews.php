<?php

/** @var \common\models\Developers $model */

use yii\helpers\Url;


?>

    <div class="content container">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                                href="<?= Url::to(['/developer']); ?>">Личный кабинет</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Отзывы</li>
                </ol>
            </nav>
        </div>
        <div class="main">
            <div class="main">
                <?= $this->render('../layouts/admin_nav');?>
            </div>
                <div class="tab_product">
                <?php
                if ($model->reviews) {
                    echo $this->render('/catalog/reviews', ['model' => $model]);
                } else echo " У вас еще нет отзывов"; ?>

            </div>
        </div>
    </div>
<?php



