<?php

use common\models\Categories;
use common\models\Programs;
use common\models\Tariffs;
use yii\helpers\Html;
use yii\helpers\Url;
/** @var Programs $model */

?>

<div class="tab-pane active" id="tab1" role="tabpanel">
    <div class="tab">
        <?php if (Yii::$app->controller->action->id == 'view') { ?>
        <h3>Базовая информация</h3>
        <div class="row ">
            <div class="tab_l col-lg-6">
                <h4>Информация о передаче продуктов по умолчанию</h4>
                <h5>Длинное описание</h5>
                <p><?= $model->description;?></p>
                <h4>Короткое описание</h4>
                <p><?= $model->description_short;?></p>
            </div>
            <hr>
            <div class="tab_r col-lg-6">
                <div class="url">
                    <h5>Целевой URL:</h5>
                    <a href="<?= $model->link;?>"><?= $model->link;?></a>
                </div>
                <div class="bt">
                    <a class="btn btn-add" href="<?= Url::to(['programs/update','id' => $model->id]);?>">Изменить информацию</a>
                </div>
            </div>
        </div>
        <? }  else { ?>
        <div class="edit_inf"> <!--<div class="edit_inf d-none">-->
            <form action="<? if ($model->id) echo Url::to(['programs/update','id' => $model->id]);
            else echo Url::to(['programs/create']); ?>" METHOD="post">

                <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam,\Yii::$app->getRequest()->getCsrfToken(),[]); ?>
                <div class="row">
                    <div class="tab_l col-lg-6">

                        <label class="url input">
                            <h5>Название</h5>
                            <input type="text" name="name" value="<?= $model->name;?>">
                        </label>
                        <label class="url input">
                            <h5>Основная категория</h5>
                            <?= Html::dropDownList( 'category_id',$model->category_id, Categories::map()); ?>
                        </label>
                        <label class="url input">
                            <h5>Назначение</h5>
                            <?= Html::dropDownList( 'destination_id',$model->destination_id, Programs::mapDestinations()); ?>
                        </label>

                        <h4>Информация о продукте по умолчанию</h4>
                        <label>
                            <h5>Длинное описание</h5>
                            <div class="text_count" data-count="500">
                                                            <textarea name="description" placeholder=""
                                                                      class="send-txt"><?= $model->description;?></textarea>
                                <p class="lineCount">(<span class="nowCount">0</span>/<span
                                        class="allCount">500</span> символов)</p>
                            </div>
                        </label>
                        <label>
                            <h5>Короткое описание</h5>
                            <div class="text_count" data-count="135">
                                                            <textarea name="description_short" placeholder=""
                                                                      class="send-txt"><?= $model->description_short;?></textarea>
                                <p class="lineCount">(<span class="nowCount">0</span>/<span
                                        class="allCount">135</span> символов)</p>
                            </div>
                        </label>
                    </div>
                    <hr>
                    <div class="tab_r col-lg-6">
                        <label class="url input">
                            <h5>Целевой URL:</h5>
                            <input type="text" name="link" value="<?= $model->link;?>">
                        </label>
                        <label>
                            <h5>Ссылка демо-версии</h5>
                            <input type="text" name="trial_link" value="<?= $model->trial_link;?>">
                        </label>
                        <h5>Акции</h5>
                        <div class="sale row">
                            <?php $tags = $model->tags;?>
                            <div class="col-7 sale_l">
                                <p>Название</p>
                                <input type="text" name="tags[0][name]" placeholder="Скидка 50%" value="<?= $tags[0]?$tags[0]->name:''?>">
                                <input type="text" name="tags[1][name]" placeholder="В подарок онлайн запись" value="<?= $tags[1]?$tags[1]->name:''?>">
                                <input type="text" name="tags[2][name]" placeholder="1 месяц бесплатно " value="<?= $tags[2]?$tags[2]->name:''?>">
                                <input type="text" name="tags[3][name]" placeholder="Личное обучение" value="<?= $tags[3]?$tags[1]->name:''?>">
                            </div>
                            <div class="col-5 sale_r">
                                <p>Ссылка</p>
                                <input type="text" name="tags[0][link]" value="<?= $tags[0]?$tags[0]->link:''?>">
                                <input type="text" name="tags[1][link]" value="<?= $tags[0]?$tags[0]->link:''?>">
                                <input type="text" name="tags[2][link]" value="<?= $tags[0]?$tags[0]->link:''?>">
                                <input type="text" name="tags[3][link]" value="<?= $tags[0]?$tags[0]->link:''?>">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="btns">
                    <div class="bt">
                        <button class="btn btn-remove" href="<? if ($model->id) echo Url::to(['programs/view','id' => $model->id]); else echo Url::to(['developer']); ?>">Отмена</button>
                    </div>
                    <div class="bt">
                        <button class="btn btn-add" type="submit">Сохранить информацию</button>
                    </div>
                </div>
            </form>
        </div>

        <?php } ?>
    </div>

    <? if ($model->id && $model->tariff) {
        if (($tariff = Tariffs::find()
            ->where(['rate' => $model->tariff])
                ->one()) ) {
            /** @var Tariffs $tariff */
            ?>

            <div class="tariff d-none d-lg-block">
                <table class="table">
                    <tr>
                        <th>Тариф</th>
                        <th>Категория</th>
                        <th>Название</th>
                    </tr>
                    <tr>
                        <td><?= $tariff->rate;?></td>
                        <td><a href="#"><?= $tariff->category?$tariff->category->name:'';?></a></td>
                        <td><?= $tariff->name;?></td>
                    </tr>
                </table>
            </div>

            <?php

        } ?>

    <? } ?>


</div>

