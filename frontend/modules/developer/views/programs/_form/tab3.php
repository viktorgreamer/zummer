<?php


use common\models\Functions;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var \common\models\Programs $model */

$functionsId = ArrayHelper::getColumn($model->functions, 'id');


?>

<div class="tab-pane" id="tab3" role="tabpanel">
    <div class="tab specifications">
        <h3>Характеристики</h3>
        <h5>Отметьте функции, реализованные в вашем продукте</h5>
        <form action="<? if ($model->id) echo Url::to(['programs/update', 'id' => $model->id]);
        else echo Url::to(['programs/create']); ?>" METHOD="post">
            <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam,\Yii::$app->getRequest()->getCsrfToken(),[]); ?>

            <?php if ($functionGroups = Functions::groupedByTypeFunctions()) {
            foreach ($functionGroups as $type_id => $functionGroup) { ?>
                <div class="fl personal">
                    <div class="titl"><a data-toggle="collapse" href="#type<?=$type_id;?>" role="button"
                                         aria-expanded="true" class="active"><?= Functions::mapTypes()[$type_id]; ?><img alt="" src="/img/arr_fl.png"></a></div>
                    <div class="input collapse show" id="type<?=$type_id;?>" style="">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php /** @var Functions $function */
                                foreach (array_filter($functionGroup, function ($key) {
                                    return $key % 2;
                                }, ARRAY_FILTER_USE_KEY) as $key => $function) { ?>
                                    <label>
                                        <input type="checkbox"
                                               name="functions[]" <? if (in_array($function->id, $functionsId)) echo "checked"; ?>
                                               value="<?= $function->id; ?>" class="checkbox d-none">
                                        <span class="checkbox__text"><?= $function->name; ?></span>
                                    </label>
                                <? } ?>
                            </div>
                            <div class="col-lg-6">
                                <?php /** @var Functions $function */
                                foreach (array_filter($functionGroup, function ($key) {
                                    return !$key % 2;
                                }, ARRAY_FILTER_USE_KEY) as $key => $function) { ?>
                                    <label>
                                        <input type="checkbox"
                                               name="functions[]" <? if (in_array($function->id, $functionsId)) echo "checked"; ?>
                                               value="<?= $function->id; ?>" class="checkbox d-none">
                                        <span class="checkbox__text"><?= $function->name; ?></span>
                                    </label>
                                <? } ?>
                            </div>
                        </div>


                    </div>
                </div>
            <?php }
        } ?>
        <div class="btns">
            <div class="bt">
                <button class="btn btn-add" type="submit">Сохранить информацию</button>
            </div>
            <div class="bt">
                <button class="btn btn-remove" href="<?= Url::to(['programs/view','id' => $model->id]);?>">Отмена</button>
            </div>
        </div>
        </form>
    </div>
</div>

