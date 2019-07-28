<?php

/* @var $model \common\models\Categories */
?>


<div class="jumbotron">
  <div class="container" style="background-color: whitesmoke">
    <h3>
        <?= $model->name; ?>
    </h3>
     <?php
     if ($model->description) echo \yii\helpers\Html::tag('p', $model->description);
     ?>
      <? if ($model->programs) { ?>

          <div>
              <a href="<?php echo \yii\helpers\Url::to(['/catalog/index','category_id' => $model->id]); ?>">Программы <span class="badge"><?= count($model->programs); ?></span></a>
          </div>
      <? } ?>



  </div>
</div>