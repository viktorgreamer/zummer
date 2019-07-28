<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['developer/default/verify-email', 'token' => $user->verification_token]);
?>
Hello ,

Follow the link below to verify your email:

<?= $verifyLink ?>
