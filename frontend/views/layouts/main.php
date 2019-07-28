<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="<?= AppAsset::bodyClass(); ?>">
<?php $this->beginBody() ?>


<?php  echo $this->render(AppAsset::header());?>
<?= Alert::widget();?>
<?= $content ?>

<?php  echo $this->render('footer');?>
<?php


$js = <<<JS
$(document).on('click', '.add-to-compare' , function(e) {
e.preventDefault();
var id = $(this).data('id');
console.log('.tab_ph a.close');
$.ajax({
url: "/catalog/add-to-compare",
data: {
"id": id,
},
cache: false,
type: "get",
success: function(response) {

},
error: function(xhr) {

}
});

});

$(document).on('click', '.remove-from-compare' , function(e) {
e.preventDefault();
var element = $(this).parents('.item');
console.log(element);
var id = $(this).data('program_id');
console.log('.tab_ph a.close');
$.ajax({
url: "/catalog/remove-from-compare",
data: {
"id": id,
},
cache: false,
type: "get",
success: function(response) {
element.remove();
try { location.reload(); } catch {}
},
error: function(xhr) {

}
});

});


JS;
Yii::$app->view->registerJs($js, 4);

?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
