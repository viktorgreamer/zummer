<?php
/** @var \yii\web\View $this */
/** @var \common\models\Programs $program */
/** @var  \frontend\models\CreateReviewForm $model */
$this->title = 'Написать отзыв o '.$program->name;

echo $this->render('_form', [
    'model' => $model,
    'program' => $program
]);
