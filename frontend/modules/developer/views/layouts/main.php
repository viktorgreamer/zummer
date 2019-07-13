<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\modules\developer\assets\AppAsset;
use yii\helpers\Html;

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

<?= $content ?>

<?php  echo $this->render('footer');?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
