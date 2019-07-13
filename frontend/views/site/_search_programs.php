<?php

use common\models\Programs;
use common\models\Reviews;

?>

<div class="search_bl">
    <div class="container">
        <div class="utp">
            <h1>Выберите свою программу <br>для организации рабочего процесса</h1>
            <p>Управление проектами даст возможность расставлять приоритеты <br>и повысить продуктивность работы всей
                компании.</p>
        </div>
        <form class="search form_search" action="<?= \yii\helpers\Url::to(['search']); ?>" method="get">
            <div class="input-group">
                <input type="text" class="form-control input_search" placeholder="Поиск по каталогу"
                       aria-describedby="btnSearch">
                <div class="input-group-append">
                    <button class="btn btn-search btn-green btn_search" type="button"><img alt="" src="/img/icons/ico-search.png">
                    </button>
                </div>
            </div>

            <div class="search_modal">
            </div>

        </form>
        <div class="advantages">
            <div class="row tabs">
                <div class="col-4 tab">
                    <div class="ico"><img alt="" src="/img/icons/ico-program.png"></div>
                    <p class="titl">Более <?= round(Programs::find()->count(), -1); ?> программ</p>
                    <p class="d-none d-xl-block">У нас вы найдете большое количество систем, под самый разный бизнес</p>
                </div>
                <div class="col-4 tab">
                    <div class="ico"><img alt="" src="/img/icons/ico-vallet.png"></div>
                    <p class="titl">Повысьте ваши продажи</p>
                    <p class="d-none d-xl-block">CRM-маркетинг усиливает конверсию и повышает повторные продажи</p>
                </div>
                <div class="col-4 tab">
                    <div class="ico"><img alt="" src="/img/icons/ico-review.png"></div>
                    <p class="titl">+ <?= round(Reviews::find()->count(), -1); ?> <br>отзывов</p>
                    <p class="d-none d-xl-block">Не можете выбрать программу читайте реальные отзывы клиентов</p>
                </div>
            </div>
        </div>
    </div>
</div>
