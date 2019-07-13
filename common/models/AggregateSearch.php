<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 07.07.2019
 * Time: 12:23
 */

namespace common\models;


use yii\base\Model;

class AggregateSearch extends Model
{

    const LIMIT_TO_RENDER = 3;
    public $q;

    public $programs;
    public $programs_count;

    public $categories;
    public $categories_count;
    public $articles;
    public $articles_count;

    public function search()
    {
        $this->load(\Yii::$app->request->getQueryParams(), '');
        if ($this->q) {
            $query_program = Programs::find()->where(['OR',
                ['like', 'name', $this->q],
                ['like', 'description', $this->q],
                ['like', 'destination', $this->q]
            ]);

            $this->programs_count = $query_program->count();
            $this->programs = $query_program->limit(self::LIMIT_TO_RENDER)->all();

            $query_categories = Categories::find()->where(['OR',
                ['like', 'name', $this->q],
                ['like', 'description', $this->q]
            ]);
            $this->categories_count = $query_categories->count();
            $this->categories = $query_categories->limit(self::LIMIT_TO_RENDER)->all();


            $query_articles = ContentArticles::find()->where(['OR',
                ['like', 'name', $this->q],
                ['like', 'body', $this->q]
            ]);

            $this->articles_count = $query_articles->count();
            $this->articles = $query_articles->limit(self::LIMIT_TO_RENDER)->all();

        }
    }

    public static function mapResultsCount()
    {
        return [
            1 => 'результат',
            2 => 'результата',
            3 => 'результата',
            4 => 'результата',
            5 => 'результатов',
            6 => 'результатов',
            7 => 'результатов',
            8 => 'результатов',
            9 => 'результатов',
            10 => 'результатов',
        ];
    }

    public function renderResultCount($count)
    {
        return isset(self::mapResultsCount()[$count]) ? $count." ".self::mapResultsCount()[$count]    : "Более " . round($count,-1) . " результатов";
    }

    public function rules()
    {
        return [
            ['q', 'string']
        ];
    }
}