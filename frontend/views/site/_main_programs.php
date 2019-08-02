<?php

use common\models\Programs;
use yii\helpers\Url;
/** @var \yii\web\View $this */
?>

    <div id="main_programs">
        <?
        foreach (Programs::mapDestinations() as $destination_id => $destination_title) {
            if ($destination_id != 1) $style = 'display:none'; else $style = '';
            if ($programs = Programs::positionOne(4, $destination_id)) { ?>
                <div id="destination_id_<?= $destination_id; ?>" class="programs_for container" style="<?= $style; ?>">
                    <?php echo $this->render('_destination_program_row_tab',['programs' => $programs]);?>
                   <?php if (Programs::find()->where(['destination_id' => $destination_id])->cache(60)->count() > 4) { ?>
                    <div class="see_more" data-destination_id="<?= $destination_id; ?>" value="<?= Url::to(['catalog/popular-ajax','destination_id' => $destination_id, 'offset' => 4]);?>">
                        <a href="" class="active">Смотреть еще <img alt="" src="/img/load.png"></a>
                    </div>
                   <? } ?>
                </div>
                <?
            }
        }
        ?>
    </div>
<?
$js = <<<JS
$(document).on('click', ".navigator_home .tab", function() {

let destination_id = $(this).data('destination_id');
$('.programs_for').css('display','none');
$('.navigator_home .tab').removeClass('active');

$(this).addClass('active');
console.log('TAB WAS CLICKED ' + destination_id);
$('#destination_id_' + destination_id).css('display','');
});

// see more section
$(document).on('click','.see_more',function(e) {

let destination_id = $(this).data('destination_id');

e.preventDefault();
console.log($(this).attr('value'));
console.log($(document).find("#destination_id_" + destination_id +" .row").last());
$(document).find("#destination_id_" + destination_id +" .load-after-me").last().load($(this).attr('value'));
$(this).remove();
});


JS;

$this->registerJs($js, 4);