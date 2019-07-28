<?php

/** @var \common\models\ContentNews $model */
/** @var \yii\web\View $this */

?>

<div class="content container">

    <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$model->name; ?></li>
            </ol>
        </nav>
    </div>


    <div class="main">
        <div class="title_bl">
            <h1 class="title"><?=$model->name; ?></h1>
        </div>
        <div class="single_page">
            <?php echo $model->getFullBody();?>
        </div>


    </div>
</div>


