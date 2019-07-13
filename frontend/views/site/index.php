<?php

use common\models\Programs;
use common\models\Reviews;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?= yii\authclient\widgets\AuthChoice::widget([
     'baseAuthUrl' => ['site/auth'],
     'popupMode' => false,
]) ?>
<?php

/** @var \yii\web\View $this */

?>

<?= $this->render('_search_programs'); ?>
<?= $this->render('_navigator_home'); ?>
<?= $this->render('_main_programs'); ?>
<?= $this->render('_popular_programs'); ?>
<?= $this->render('_subscriptions'); ?>
<?= $this->render('_company'); ?>
<?= $this->render('_reviews'); ?>
<?= $this->render('_news'); ?>




<?php
$js =<<<JS
$(function () {
        // Карусель в шапке, стр. главная
        $('.navigator').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: false,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 2
                },
                767: {
                    items: 4
                },
                992: {
                    items: 5
                },
                1200: {
                    items: 6,
                    loop: false,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false,
                    freeDrag: false
                }
            }
        });
        /****************************************************/


        // Карусель "Компаний", стр. главная
        $('.company_sl').owlCarousel({
            center: true,
            loop: true,
            margin: 40,
            nav: true,
            navText: false,
            dots: false,
            items: 5,
            autoWidth: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                767: {
                    items: 3
                },
                992: {
                    items: 4,
                    center: false,
                },
                1200: {
                    items: 4,
                    center: false,
                    margin: 55,
                }
            }
        });
        /****************************************************/


        // Карусель "Отзывы"
        $('.reviews_sl').owlCarousel({
            loop: true,
            center: true,

            margin: 30,
            nav: true,
            navText: false,
            dots: true,
            items: 2,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1,

                },
                767: {
                    autoWidth: true,
                    items: 2
                },
                992: {
                    items: 2,
                    autoWidth: true,
                },
                1300: {
                    items: 3,
                    autoWidth: true,
                }
            }
        });
        /****************************************************/
    });
JS;
$this->registerJs($js, \yii\web\View::POS_READY); ?>
?>
