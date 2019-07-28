<?php

use common\models\Platforms;
use common\models\Functions;
use common\models\Programs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var Programs $model */

?>

<div class="tab-pane" id="tab2" role="tabpanel">
    <form action="<? if ($model->id) echo Url::to(['programs/update', 'id' => $model->id]);
    else echo Url::to(['programs/create']); ?>" METHOD="post">
        <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>

        <div class="tab variants">
            <h3>Информация о продукте</h3>
            <div class="row">
                <div class="col-lg-6 col-xl-4 tab_var">
                    <h4>Платформы</h4>
                    <p class="titl_gr">Выберите все подходящие варианты</p>
                    <?php
                    $platformsId = ArrayHelper::getColumn($model->platforms, 'id');
                    /** @var Platforms $platform */
                    foreach (Platforms::find()->all() as $key => $platform) { ?>
                        <label>
                            <input type="checkbox" name="platforms[<?=$platform->id;?>]"
                                    value="<?= $platform->id;?>" <?= in_array($platform->id, $platformsId) ? 'checked' : ''; ?>
                                   class="checkbox d-none">
                            <span class="checkbox__text"><?= $platform->name; ?></span>
                        </label>

                    <? } ?>
                </div>
                <div class="col-lg-6 col-xl-4 tab_var">
                    <h4>Служба поддержки</h4>
                    <p class="titl_gr">Выберите все подходящие варианты</p>
                    <?php
                    foreach (Programs::mapSupport() as $key => $support) { ?>
                        <label>
                            <input type="checkbox" name="support_map[<?= $key; ?>]"
                                   value="<?= $key; ?>"
                                <?= in_array($key, $model->support_map) ? 'checked' : ''; ?>
                                   class="checkbox d-none">
                            <span class="checkbox__text"><?= $support; ?> </span>
                        </label>
                    <? } ?>

                    <h6>Стоимость поддержки:</h6>
                    <label>
                        <input type="checkbox" name="support_free" value="1"
                               class="checkbox d-none"<?= $model->support_free ? 'checked' : ''; ?> >
                        <span class="checkbox__text">Включено с покупкой</span>
                    </label>
                    <label>
                        <input type="checkbox" name="support_paid"  value="1"
                               class="checkbox d-none"<?= $model->support_paid ? 'checked' : ''; ?>>
                        <span class="checkbox__text">Дополнительная плата / премиум доступы</span>
                    </label>

                </div>
                <div class="col-lg-6 col-xl-4 tab_var">
                    <h4>Пробная / Демо-версия</h4>

                    <h6>Бесплатная пробная версия?</h6>
                    <div class="radio_bl">
                        <label class="radio">
                            <input type="radio" name="has_trial" <?= $model->has_trial ? 'checked' : ''; ?> value="1"/>
                            <div class="radio__text">Да</div>
                        </label>
                        <label class="radio">
                            <input type="radio" name="has_trial" <?= !$model->has_trial ? 'checked' : ''; ?> value="0"/>
                            <div class="radio__text">Нет</div>
                        </label>
                    </div>
                    <h6>Параметры демонстрации</h6>
                    <p class="titl_gr">Выберите все подходящие варианты</p>

                    <?php
                    foreach (Programs::mapDemonstrations() as $key => $demonstration) { ?>
                        <label>
                            <input type="checkbox" name="demonstration_map[]"
                                   value="<?= $key; ?>"
                                <?= in_array($key, $model->demonstration_map) ? 'checked' : ''; ?>
                                   class="checkbox d-none">
                            <span class="checkbox__text"><?= $demonstration; ?></span>
                        </label>
                    <? } ?>

                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-6 col-xl-4 tab_var">
                    <h4>Цены</h4>

                    <h6>Бесплатная версия?</h6>
                    <div class="radio_bl">
                        <label class="radio">
                            <input type="radio" name="has_free" <?= $model->has_free ? 'checked' : ''; ?> value="1"/>
                            <div class="radio__text">Да</div>
                        </label>
                        <label class="radio">
                            <input type="radio" name="has_free" <?= !$model->has_free ? 'checked' : ''; ?> value="0"/>
                            <div class="radio__text">Нет</div>
                        </label>
                    </div>

                    <label>
                        <h6>Начальная цена <span>(самая низкая)</span></h6>
                        <input class="start_price" type="text" name="price_from" placeholder="1 000"
                               value="<?= $model->price_from; ?>"> руб.
                    </label>

                    <h6>Эта цена</h6>
                    <div class="radio_bl">
                        <label class="radio d-block">
                            <input type="radio" name="price_plan" <?= ($model->price_plan == 1) ? 'checked' : ''; ?> value="1"/>
                            <div class="radio__text">Единоразово</div>
                        </label>
                        <label class="radio d-block">
                            <input type="radio" name="price_plan" <?= ($model->price_plan == 2) ? 'checked' : ''; ?> value="2"/>
                            <div class="radio__text">В месяц</div>
                        </label>
                        <label class="radio d-block">
                            <input type="radio" name="price_plan" <?= ($model->price_plan == 3) ? 'checked' : ''; ?> value="3"/>
                            <div class="radio__text">В год</div>
                        </label>
                    </div>

                    <h6>На пользователя</h6>
                    <div class="radio_bl">
                        <label class="radio">
                            <input type="radio"
                                   name="price_per_users" <?= $model->price_per_users ? 'checked' : ''; ?>  value="1"/>
                            <div class="radio__text">Да</div>
                        </label>
                        <label class="radio">
                            <input type="radio"
                                   name="price_per_users" <?= !$model->price_per_users ? 'checked' : ''; ?>  value="0"/>
                            <div class="radio__text">Нет</div>
                        </label>
                    </div>


                    <label>
                        <h6>Информация о ценах</h6>
                        <div class="text_count"><textarea name="prices" placeholder="" class="send-txt">
                                <?= $model->prices; ?>
                            </textarea>
                            <p class="lineCount">(<span class="nowCount">0</span>/<span
                                        class="allCount">75</span> символов)</p>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="hide_price"
                               class="checkbox d-none" <?= $model->hide_price ? 'checked' : ''; ?>  value="1">
                        <span class="checkbox__text"><b>Не отображать цены</b></span>
                    </label>

                </div>
                <div class="col-lg-6 col-xl-8 tab_var">
                    <h4>Обучение</h4>
                    <h6>Варианты обучения:</h6>
                    <p class="titl_gr">Выберите все подходящие варианты</p>
                    <?php
                    foreach (Programs::mapLearning() as $key => $learning) { ?>
                        <label>
                            <input type="checkbox" name="learning_map[]"
                                   value="<?= $key; ?>"
                                <?= in_array($key, $model->learning_map) ? 'checked' : ''; ?>
                                   class="checkbox d-none">
                            <span class="checkbox__text"><?= $learning; ?> </span>
                        </label>
                    <? } ?>
                    <h6>Стоимость обучения:</h6>
                    <label>
                        <input type="checkbox" name="learning_free"
                               class="checkbox d-none"<?= $model->learning_free ? 'checked' : ''; ?>  value="1" >
                        <span class="checkbox__text">Включено с покупкой</span>
                    </label>
                    <label>
                        <input type="checkbox" name="learning_paid"
                               class="checkbox d-none"<?= $model->learning_paid ? 'checked' : ''; ?>  value="1">
                        <span class="checkbox__text">Дополнительная плата / премиум доступы</span>
                    </label>
                </div>
            </div>

            <hr>

            <h4>Целевая аудитория</h4>
            <div class="row">
                <div class="col-lg-6 col-xl-4">
                    <h5>Размер штата у клиента (сотрудников)</h5>
                    <p class="titl_gr">Выберите все подходящие варианты</p>
                    <?php foreach (Programs::mapUsersCount() as $key => $label) { ?>
                    <label>
                        <input type="checkbox" name="users_count_map[]"  value="<?= $key; ?>"
                               <?= in_array($key,$model->users_count_map) ? 'checked' : ''; ?> class="checkbox d-none">
                        <span class="checkbox__text"><?= $label;?></span>
                    </label>
                    <? } ?>
                </div>
                <div class="col-lg-6 col-xl-8">
                    <h5>Для кого ваш продукт?</h5>
                    <h6>Опишите ваш целевой рынок</h6>
                    <div class="text_count" data-count="500">
                        <textarea name="destination" placeholder="" class="send-txt"><?= $model->destination;?></textarea>
                        <p class="lineCount">(<span class="nowCount">0</span>/<span
                                    class="allCount">500</span> символов)</p>
                    </div>
                </div>
            </div>

            <hr>
            <div class="btns">
                <div class="bt">
                    <button class="btn btn-add" type="submit">Сохранить информацию</button>
                </div>
            </div>

        </div>
    </form>
</div>


