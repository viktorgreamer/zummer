<?


use common\models\Categories;
use common\models\Functions;
use yii\helpers\Url;

/** @var \common\models\ProgramsSearch $searchModel */
?>


<div class="col-xl-3">
    <div class="filter">
        <div class="btn_mobile">
            <a data-toggle="collapse" href="#filter_c" role="button"
               aria-expanded="false"><span>развернуть фильтр</span>
                <img alt="" src="/img/arr_filter.png"></a>
        </div>

        <div id="filter_c" class="filter_c collapse">
            <div class="filter_bl">
                <form class="row" id='search_programs_form' method="get"
                      action="<?= Url::to(['/catalog']); ?>">



                    <div class="col-lg-4 col-xl-12">
                        <div class="sort">
                            <div class="titl" style="font-size: 15px;position: relative;font-weight: bold;">Категория
                            </div>
                            <select id="category_id" name="category_id">
                                <? foreach (Categories::map() as $id => $name) { ?>
                                    <option <? if ($id == $searchModel->category_id) echo "selected"; ?> value="<?= $id;?>" ><?= $name; ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="fl price">
                            <div class="titl">Цена</div>
                            <div class="input">
                                от <input type="text" name="price_from" class="form-control-range"
                                          id="minPrice" value="<?= $searchModel->price_from; ?>">
                                до <input type="text" name="price_to" class="form-control-range mr-xl-0"
                                          id="maxPrice" value="<?= $searchModel->price_to; ?>">
                                <div id="slider-range"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-12">
                        <div class="fl pricing">
                            <div class="titl"><a data-toggle="collapse" href="#pricing" role="button"
                                                 aria-expanded="true" class="active">Ценооброзование
                                    <img alt="" src="/img/arr_fl.png"></a></div>
                            <div class="input collapse show" id="pricing">
                                <label>
                                    <input type="checkbox" <? if ($searchModel->has_free) echo "checked"; ?>
                                           name="has_free" class="checkbox d-none">
                                    <span class="checkbox__text">Бесплатная версия</span>
                                </label>
                                <label>
                                    <input type="checkbox"
                                           name="has_month_plan" <? if ($searchModel->has_month_plan) echo "checked"; ?>
                                           class="checkbox d-none">
                                    <span class="checkbox__text">Месячная подписка</span>
                                </label>
                                <label>
                                    <input type="checkbox"
                                           name="has_year_plan" <? if ($searchModel->has_year_plan) echo "checked"; ?>
                                           class="checkbox d-none">
                                    <span class="checkbox__text">Годовая подписка</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xl-12">
                        <?php
                        if ($functionGroups = Functions::groupedByTypeFunctions()) {
                            foreach ($functionGroups as $type_id => $functionGroup) { ?>
                                <div class="fl functions" data-function_type_id="<?= $type_id; ?>">
                                    <div class="titl"><a data-toggle="collapse"
                                                         href="#functions_type_id_<?= $type_id; ?>" role="button"
                                                         aria-expanded="true"
                                                         class="active"><?= Functions::mapTypes()[$type_id]; ?> <img
                                                    alt="" src="/img/arr_fl.png"></a>
                                    </div>
                                    <div class="input collapse show" id="functions_type_id_<?= $type_id; ?>">
                                        <?php /** @var Functions $function */
                                        foreach ($functionGroup as $function) {
                                            ?>
                                            <label>
                                                <input type="checkbox" data-categories="<?= implode(",",array_filter($function->getCategoriesId()->column()));?>"
                                                       name="functions[]" <? if (in_array($function->id, $searchModel->functions)) echo "checked"; ?>
                                                       value="<?= $function->id; ?>"
                                                       class="checkbox d-none">
                                                <span class="checkbox__text"><?= $function->name; ?></span>
                                            </label>
                                        <? } ?>
                                    </div>

                                </div>
                            <? }
                        } ?>

                    </div>


                    <div class="col-lg-2 col-xl-12">
                        <div class="bt">
                            <button type="submit" class="btn btn-find">Найти</button>
                        </div>
                        <div class="bt">
                            <button type="button" class="btn btn-clear" id="clearFilter">очистить
                                фильтр
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

<?php
$js = <<<JS
$(document).on('change','#category_id', function() {
init_functions();
// hiding  collapse




var function_types_list = $(document).find(".input.collapse");


console.log(function_types_list);
if (function_types_list.length > 0) {
    function_types_list.each(function() {
    console.log($(this).find('input *[data-visible="1"]').length);
      /* if ($(this).find('input[data-visible="1"]').length == 0) $(this).css('display','none');
       else  $(this).parent().css('display','block');*/
    });
}

});

function init_functions() {
let category_id = parseInt($('#category_id').val());
console.log('category_was_changed to ' + category_id );
var divList = $(document).find(".functions .input .checkbox");
if (divList) {
            divList.each(function(item) {
            
             let categories = $(this).data('categories');
             if ( typeof categories == 'string') {
                     var categories_array = categories.split(',').map(function(item) {
                            return parseInt(item, 10);
                        });
             } else categories_array = [categories];
            
            if (in_array(category_id, categories_array) == 1) {
            $(this).parent().css('display','block');
             $(this).data('visible',1);
            } else {
             $(this).parent().css('display','none');
             $(this).removeAttr('checked');
             // $(this).val(0);
               $(this).data('visible',0);
            }
              //console.log(in_array(category_id, categories_array));
             
            });
}
}

init_functions();

JS;
Yii::$app->view->registerJs($js, \yii\web\View::POS_READY);
