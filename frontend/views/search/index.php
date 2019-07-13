<?php
/** @var \common\models\AggregateSearch $searchModel */

use yii\helpers\Url;
?>
    <?php
    if ($searchModel->categories) { ?>
    <div class="row_search">
            <p class="titl_row">Категории <span>( <?= $searchModel->renderResultCount($searchModel->categories_count); ?> )</span></p>
            <ul>
                <?php /** @var \common\models\Categories $category */
                foreach ($searchModel->categories as $category) { ?>
                <li><a href="<?= Url::to(['/categories/view','id' => $category->id]); ?>"><?= $category->name; ?></a></li>
                <? } ?>

            </ul>

        <? if (count($searchModel->categories) < $searchModel->categories_count) { ?>
            <div class="more_row">
                <a href="<?= Url::to(['/categories','title' => $searchModel->q]); ?>">Больше</a>
            </div>

        <? } ?>
    </div>
    <? } ?>
    <? if ($searchModel->programs) { ?>

    <div class="row_search">
        <p class="titl_row">Программы <span>( <?= $searchModel->renderResultCount($searchModel->programs_count); ?> )</span></p>
        <ul>
            <? /** @var \common\models\Programs $program */
            foreach ($searchModel->programs as $program) { ?>
            <li><a href="<?= Url::to(['/programs','title' => $searchModel->q]); ?>"><img width="110px" src="<?= $program->getLogo(); ?>"></a></li>
            <? } ?>

        </ul>

        <? if (count($searchModel->programs) < $searchModel->programs_count) { ?>
        <div class="more_row">
            <a href="<?= Url::to(['/programs','title' => $searchModel->q]); ?>">Больше</a>
        </div>
        <? } ?>
    </div>
    <? } ?>

    <? if ($searchModel->articles) { ?>
    <div class="row_search">
        <p class="titl_row">Статьи <span>( <?= $searchModel->renderResultCount($searchModel->articles_count); ?> )</span></p>
        <ul>
            <?php
            /** @var \common\models\ContentArticles $article */
            foreach ($searchModel->articles as $article) { ?>
                <li><a href="<?= Url::to(['/articles/view','id' => $article->id]); ?>"><?= $article->name; ?></a></li>
            <? } ?>
        </ul>
        <? if (count($searchModel->articles) < $searchModel->articles_count) { ?>
        <div class="more_row">
            <a href="<?= Url::to(['/articles','title' => $searchModel->q]); ?>">Больше</a>
        </div>
        <? } ?>
    </div>
    <? } ?>
