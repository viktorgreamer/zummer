<?php

use yii\helpers\Url; ?>




<div class="mailing">
    <div class="container">
        <div class="title_bl">
            <p class="title">Подпишитесь <br>на рассылку</p>
            <p>Будьте всегда в курсе наших <br>специальных предложений!</p>
        </div>
        <form action='<?= Url::to('/subscriptions/create'); ?>' method="post">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
            <div class="form-inline">
                <div class="form-group">
                    <input type="text" name="email" placeholder="Ваш E-mail">
                </div>
                <button type="submit" class="btn btn-green bnt-more">подписаться</button>
            </div>
            <label class="form-check-label" for="check1">
                <input type="checkbox" class="form-check-input d-none" id="check1">
                <span class="checkbox"></span>
                Я даю согласие на <br><a href="#">обработку персональных данных</a>
            </label>
        </form>
    </div>
</div>

