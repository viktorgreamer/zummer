<?php

use common\models\Categories;
use common\models\CategoryIndustries;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/** @var \yii\data\ActiveDataProvider $dataProvider */
?>


<div class="content container">

    <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Категории программ</li>
            </ol>
        </nav>
    </div>


    <div class="main">
        <div class="title_bl">
            <h1 class="title">Смотрите все категории сервисов и программ</h1>
            <p>Найдите свое программное обеспечение в одной из наших <?= round(Categories::find()->count(), -1); ?> +
                категорий. От бухгалтерии до управления студией йоги, мы покрываем все это!</p>
        </div>

        <div class="row">
            <?php if ($popularCategories = Categories::getPopular()) { ?>
                <div class="col-md-5 order-md-2 col-xl-4 cat_popular">
                    <div class="tab">
                        <p class="titl"><img src="/img/like.png"> Популярные категории</p>
                        <ul>
                            <?php /** @var Categories $popularCategory */
                            foreach ($popularCategories as $popularCategory) { ?>
                                <li>
                                    <a href="<?= Url::to(['/catalog', 'category_id' => $popularCategory->id]); ?>"><?= $popularCategory->name; ?></a>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            <? } ?>
            <div class="col-md-7 order-md-1 col-xl-8 cat_list">
                <div class="cat_search">
                    <form action="<?= Url::to(['/categories']); ?>" method="get">
                        <p>Найдите нужную категорию:</p>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" name="query" value="<?= $searchModel->query;?>">
                            <div class="input-group-append">
                                <button class="btn btn-green btn_search" type="submit"><img src="/img/loop_big.png">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tabs">
                    <?
                    if ($dataProvider->getModels() && $categoryTypes = array_unique(ArrayHelper::getColumn($dataProvider->getModels(), 'industry_id'))) {
                        foreach ($categoryTypes as $categoryType) { ?>
                            <div class="tab">

                                <p class="titl"><?= CategoryIndustries::find()->where(['id' => $categoryType])->one()->name; ?></p>
                                <ul>
                                    <?php foreach (array_filter($dataProvider->getModels(), function ($item) use ($categoryType) { return $item->industry_id == $categoryType;}) as $category)  { ?>
                                    <li><a href="<?= Url::to(['/catalog','category_id' => $category->id]);?>"><?= $category->name;?></a></li>
                                    <? } ?>
                                </ul>
                            </div>

                        <? } ?>
                    <? } ?>

                </div>
            </div>
        </div>

    </div>
</div>
