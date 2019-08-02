<?php

use common\models\Programs;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProgramsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programs';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="programs-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(' Создать программу', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //   'filterModel' => $searchModel,
            'options' => ['style' => 'table-layout:fixed;'],
            'columns' => [
                //  ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'label' => 'Общая информация',
                    'format' => 'html',
                    'value' => function (Programs $model) {
                        $options = [];
                        $options[] = "<h3>" . $model->name . "</h3>";
                        $options[] = Html::img($model->getLogo(), ['style' => 'width:200px;height:78px']);
                        $options[] = $model->category->name;
                        $options[] = Programs::mapDestinations()[$model->destination_id];
                        if ($model->images) {
                            $images = [];
                            $images[] = "<h6>Картинки</h6>";

                            foreach ($model->images as $image) {
                                $images[] = Html::tag('div', Html::img($image->src, ['style' => 'width:70px;height:70px'])
                                    . Html::a('X', '#', [
                                        'class' => 'btn btn-danger btn-xs remove-image-button',
                                        'data' => [
                                            'image_id' => $image->id
                                        ]]));
                            }
                            $options[] = implode(" ", $images);
                        }
                        if ($model->awards) {
                            $images = [];
                            $images[] = "<h6>Награды</h6>";

                            foreach ($model->awards as $image) {
                                $images[] = Html::tag('div', Html::img($image->src, ['style' => 'width:70px;height:70px'])
                                    . Html::a('X', '#', [
                                        'class' => 'btn btn-danger btn-xs remove-awards-image-button',
                                        'data-image_id' => $image->id
                                    ]));
                            }
                            $options[] = implode(" ", $images);
                        }
                        return implode("<hr style='padding: 1px; margin: 1px'>", $options);
                    }
                ],
                [
                    'label' => 'Параметры',
                    'format' => 'html',
                    'value' => function (Programs $model) {
                        $options = [];
                        $options[] = "Общий рейтинг:" . $model->rating;
                        $options[] = "Удобство:" . $model->rating_convenience;
                        $options[] = "Функции:" . $model->rating_functions;
                        $options[] = "Поддержка:" . $model->rating_support;
                        if ($model->tags) {
                            $tags = [];
                            $tags[] = "<h6>Теги</h6>";

                            foreach ($model->tags as $tag) {
                                if (trim($tag->name)) $tags[] = Html::tag('span', Html::a($tag->name, $tag->link, ['target' => '_blank']), ['class' => 'label label-default']);
                            }
                            $options[] = implode(" ", $tags);
                        }


                        return implode("<hr style='padding: 1px; margin: 1px'>", $options);
                    }
                ],
                [
                    'label' => 'Функции',
                    'format' => 'html',
                    'value' => function (Programs $model) {
                        $options = [];
                        if ($model->functions) {
                            $options[] = "<h5>Функции:</h5>";
                            foreach ($model->functions as $function) {
                                $options[] = Html::tag('span', $function->name, ['class' => 'label label-success']);
                            }
                        }
                        if ($model->platforms) {
                            $options[] = "<h5>Платформы:</h5>";
                            foreach ($model->platforms as $platform) {
                                $options[] = Html::tag('span', $platform->name, ['class' => 'label label-primary']);
                            }
                        }

                        return implode("<hr style='padding: 1px; margin: 1px'>", $options);
                    }
                ],


                [
                    'label' => 'Ссылки',
                    'format' => 'html',
                    'value' => function (Programs $model) {
                        $options = [];
                        $options[] = "<a href='http://" . \Yii::$app->request->hostName . '/catalog/view?id=' . $model->id . "' target=\"_blank\"> В каталоге</a>";
                        if ($model->link) $options[] = Html::a('Caйт', $model->link);
                        if ($model->video_link) $options[] = Html::a('Видео', $model->video_link);
                        if ($model->trial_link) $options[] = Html::a('Пробный период', $model->trial_link);
                        return implode("<hr style='padding: 1px; margin: 1px'>", $options);
                    }
                ],


                /* 'destination:ntext',
                 'description:ntext',*/

                [
                    'label' => 'Отзывы',
                    'value' => function (Programs $model) {
                        return count($model->reviews);
                    }
                ],


                [
                    'label' => 'Цены',
                    'value' => function (Programs $model) {
                        $options = [];
                        if ($model->price_from) $options[] = "От " . $model->price_from;
                        if ($model->price_to) $options[] = " до " . $model->price_to;

                        return implode("", $options);
                    }
                ],
                [
                    'label' => 'Тарифы',
                    'format' => 'html',
                    'value' => function (Programs $model) {
                        $options = [];
                        if ($model->tariff) $options[] = $model->tariff;
                        if ($model->dueDate) $options[] = 'До:' . $model->dueDate;

                        return implode("<br>", $options);
                    }
                ],

                //'rating',
                //'rating_convenience',
                //'rating_functions',
                //'rating_support',
                //'status',
                //'created_at',
                //'updated_at',
                //'developer_id',
                //'support:ntext',
                //'learning:ntext',
                //  'price_from',
                // 'price_to',
                //'prices:ntext',
                //'has_month_plan',
                //'has_year_plan',
                //'has_free',
                //'has_trial',
                //'trial_link:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>


<?

$js = <<<JS
$(document).on('click', '.remove-image-button' , function(e) {
e.preventDefault();
var element = $(this).parent();
var id = $(this).data('image_id');

console.log('.tab_ph a.close');
$.ajax({
    url: "delete-images",
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

$(document).on('click', '.remove-awards-image-button' , function(e) {
e.preventDefault();
var element = $(this).parents('.tab_ph');
var id = $(this).data('image_id');
console.log('.tab_ph a.close');
$.ajax({
    url: "delete-images-awards",
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
JS;


$this->registerJs($js, 4);