<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \common\models\Programs $model */

?>

    <div class="tab-pane" id="tab4" role="tabpanel">
        <div class="tab photo">
            <h3>Добавить фото, видео</h3>
            <div class="row">
                <div class="col-lg-8 interface">
                    <div class="title_line">
                        <p><?= $model->name; ?> | Интерфейс</p>
                    </div>
                    <div class="tabs_ph">
                        <?php if ($model->video_link) { ?>
                            <div class="tab_ph video flex-lg-fill"><img class="m-0 p-0"
                                                                        src="<?= $model->getShotFromVideo(); ?>"
                                                                        style="height: 90px; width: 90px;"><a
                                        class="close" href="#"><img src="/img/admin/close.png"></a>
                            </div>
                        <? } ?>

                        <?php if ($images = $model->getImagesInAdmin()) {
                            foreach ($images as $image) { ?>
                                <? if (is_object($image)) { ?>
                                    <div class="tab_ph flex-lg-fill">
                                        <img class="m-0 p-0 image_preview" src="<?= $image->src; ?>"
                                             style="height: 90px; width: 90px;">
                                        <a class="close remove-image" href="#" data-program_id="<?= $model->id; ?>"
                                           data-image_id="<?= $image->id; ?>"><img
                                                    src="/img/admin/close.png"></a>
                                    </div>
                                <? } else { ?>
                                    <div class="tab_ph flex-lg-fill"><a class="close" href="#"><img
                                                    src="/img/admin/close.png"></a>

                                    </div>
                                <? } ?>
                            <? } ?><? } ?>

                    </div>
                </div>
                <div class="col-lg-4 awards">
                    <div class="title_line">
                        <p>Награды</p>
                    </div>
                    <div class="tabs">
                        <?php if ($awards = $model->getImagesAwardsInAdmin()) {
                            foreach ($awards as $image) { ?>

                                <? if (is_object($image)) { ?>
                                    <div class="tab_ph"><img class="m-0 p-0" src="<?= $image->src; ?>"
                                                             style="height: 95px; width: 95px;">
                                        <a class="close remove-image-awards" href="#"
                                           data-program_id="<?= $model->id; ?>"
                                           data-image_id="<?= $image->id; ?>">x</a>

                                    </div>
                                <? } else { ?>
                                    <div class="tab_ph"><a class="close" href="#">x</a>

                                    </div>
                                <? } ?>
                            <? } ?><? } ?>
                    </div>

                </div>
            </div>
            <hr>

            <h5>Загрузить скриншот</h5>
            <div class="row">
                <div class="col-lg-7 col-xl-7">
                    <form action="<? if ($model->id) echo Url::to(['programs/update', 'id' => $model->id]);
                    else echo Url::to(['programs/create']); ?>" METHOD="post" enctype="multipart/form-data">
                        <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                        <div class="box">

                            <input type="file" name="imageFiles[]" id="file-7"
                                   class="inputfile inputfile-6"
                                   data-multiple-caption="{count} files selected" multiple="">
                            <label for="file-7"><span></span> <strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                         viewBox="0 0 20 17">
                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                    </svg>
                                    Выберите файл</strong></label>
                            <p class="podp">Поддерживаются PNS, JPG < 1MB</p>
                        </div>
                        <label class="url input">
                            <h5>Ссылка на видео на youtube</h5>
                            <input type="text" name="video_link" value="<?= $model->video_link; ?>">
                        </label>

                        <div class="btns">
                            <div class="bt">
                                <button class="btn btn-add" type="submit">Сохранить</button>
                            </div>
                            <div class="bt">
                                <button class="btn btn-remove"
                                        href="<? echo Url::to(['/developers/programs/view', 'id' => $model->id]); ?>">
                                    Отменить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--  <div class="col-lg-5 col-xl-5 d-none d-lg-block">
                      <div id="div_preview" class="embed-responsive embed-responsive-16by9 " style="max-height: 300px; max-width: 400px" >
                      </div>
                  </div>-->

            </div>
            <hr>
            <h5>Загрузить скриншот наград</h5>
            <div class="row">
                <div class="col-lg-7 col-xl-7">
                    <form action="<? if ($model->id) echo Url::to(['programs/update', 'id' => $model->id]);
                    else echo Url::to(['programs/create']); ?>" METHOD="post" enctype="multipart/form-data">
                        <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                        <div class="box">
                            <input type="file" name="imageAwardsFiles[]" id="file-awards"
                                   class="inputfile inputfile-6"
                                   data-multiple-caption="{count} files selected" multiple="">
                            <label for="file-awards"><span></span> <strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                         viewBox="0 0 20 17">
                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                    </svg>
                                    Выберите файл</strong></label>
                            <p class="podp">Поддерживаются PNS, JPG < 1MB</p>
                        </div>
                        <div class="btns">
                            <div class="bt">
                                <button class="btn btn-add" type="submit">Загрузить</button>
                            </div>
                            <div class="bt">
                                <button class="btn btn-remove"
                                        href="<? echo Url::to(['/developers/programs/view', 'id' => $model->id]); ?>">
                                    Отменить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <h5>Загрузить логотип</h5>
            <div class="row">
                <div class="col-lg-7 col-xl-7">
                    <form action="<? if ($model->id) echo Url::to(['programs/upload-logo', 'id' => $model->id]);
                    else echo Url::to(['programs/create']); ?>" METHOD="post" enctype="multipart/form-data">
                        <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                        <div class="box">
                            <input type="file" name="imageUpload" id="file-logo"
                                   class="inputfile inputfile-6"
                                   data-multiple-caption="{count} files selected">
                            <label for="file-logo"><span></span> <strong>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                         viewBox="0 0 20 17">
                                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                    </svg>
                                    Выберите файл</strong></label>
                            <p class="podp">Поддерживаются PNS, JPG < 1MB</p>
                        </div>
                        <div class="btns">
                            <div class="bt">
                                <button class="btn btn-add" type="submit">Загрузить</button>
                            </div>
                            <div class="bt">
                                <button class="btn btn-remove"
                                        href="<? echo Url::to(['/developers/programs/view', 'id' => $model->id]); ?>">
                                    Отменить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?

$js = <<<JS
$(document).on('click', '.tab_ph a.remove-image' , function(e) {
e.preventDefault();
var element = $(this).parents('.tab_ph');
var id = $(this).data('image_id');

console.log('.tab_ph a.close');
$.ajax({
    url: "/developer/programs/delete-images",
    data: { 
        "id": id, 
    },
    cache: false,
    type: "get",
    success: function(response) {
      element.remove();
    },
    error: function(xhr) {

    }
});

});

$(document).on('click', '.tab_ph a.remove-image-awards' , function(e) {
e.preventDefault();
var element = $(this).parents('.tab_ph');
var id = $(this).data('image_id');
console.log('.tab_ph a.close');
$.ajax({
    url: "/developer/programs/delete-images-awards",
    data: { 
        "id": id, 
    },
    cache: false,
    type: "get",
    success: function(response) {
       element.remove();
    },
    error: function(xhr) {

    }
});

});


$(document).on('click', '.image_preview' , function(e) {
e.preventDefault();
var src = $(this).attr('src');
$('#div_preview').html('<img src="' + src + '">');
});


JS;
Yii::$app->view->registerJs($js, 4);