<?php

namespace frontend\models;

use yii\base\Model;
use yii\base\View;
use yii\data\ActiveDataProvider;
use common\models\Programs;

/**
 * ProgramsSearch represents the model behind the search form of `common\models\Programs`.
 */
class ProgramsSearch extends Programs
{


    public function formName()
    {
        return '';
    }

    public $query;
    public $platforms = [];
    public $functions = [];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['query', 'platforms', 'functions', 'has_month_plan', 'has_year_plan', 'has_free', 'has_trial'], 'safe'],
            [['id', 'status', 'developer_id', 'category_id',], 'integer'],
            [['name', 'link', 'video_link', 'destination', 'description', 'support', 'learning', 'prices', 'trial_link'], 'safe'],
            [['rating', 'rating_convenience', 'rating_functions', 'rating_support', 'price_from', 'price_to'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function beforeValidate()
    {
        $this->price_to = preg_replace("/\D/", '', $this->price_to);
        $this->price_from = preg_replace("/\D/", '', $this->price_from);

        return parent::beforeValidate();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Programs::find();
        $query->from(['p' => Programs::tableName()]);
        $query->joinWith('platforms as platforms');
        $query->joinWith('developer as developer');
        $query->joinWith('functions as functions');
        $query->joinWith('category as cat');
        $query->joinWith('reviews as rev');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, '');

        if (!$this->validate()) {

            return $dataProvider;
        }


        if ($this->status) $query->andWhere(['p.status' => $this->status]);
        // if ($this->developer_id) $query->andWhere(['p.developer_id' => $this->developer_id]);
        if ($this->category_id) $query->andWhere(['p.category_id' => $this->category_id]);

        if ($this->has_free) $query->andWhere(['has_free' => 1]);
        if ($this->has_month_plan) $query->andWhere(['has_month_plan' => 1]);
        if ($this->has_year_plan) $query->andWhere(['has_year_plan' => 1]);

        if ($this->query) $query->andWhere(['OR',
            ['like', 'p.name', $this->query],
            ['like', 'p.destination', $this->query],
            ['like', 'p.description', $this->query],
            ['like', 'cat.name', $this->query],

        ]);

        if ($this->price_from) $query->orWhere(['OR',
            ['>=', 'p.price_from', $this->price_from],
            ['>=', 'p.price_to', $this->price_from]
        ]);
        else $this->price_from = Programs::find()->andFilterWhere(['category_id' => $this->category_id])->min('price_from');
        if ($this->price_to) $query->orWhere(['OR',
            ['<=', 'p.price_to', $this->price_from],
            ['<=', 'p.price_to', $this->price_to]
        ]);
        else $this->price_to = Programs::find()->andFilterWhere(['category_id' => $this->category_id])->max('price_to');

        if ($this->platforms) $query->andWhere(['in', 'platforms.id', $this->platforms]);
        if ($this->functions) $query->andWhere(['in', 'functions.id', $this->functions]);

        // $query->limit(3);
        $query->groupBy('p.id');

        // normalize the numbers
        $this->price_to = number_format($this->price_to,0,'.',' ');
        $this->price_from = number_format($this->price_from,0,'.',' ');
        return $dataProvider;
    }
}
