<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Programs;

/**
 * ProgramsSearch represents the model behind the search form of `common\models\Programs`.
 */
class ProgramsSearch extends Model
{

    public $query;
    public $id;
    public $platforms;
    public $functions;
    public $developer_id;
    public $category_id;
    public $status;
    public $price_from;
    public $price_to;
    public $has_month_plan;
    public $has_free;
    public $has_year_plan;
    public $has_trial;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['query', 'platforms', 'functions'], 'safe'],
            [['id', 'status', 'developer_id','category_id', 'has_month_plan', 'has_year_plan', 'has_free', 'has_trial'], 'integer'],
            [['name', 'link', 'support', 'learning', 'prices', 'trial_link'], 'safe'],
            [['price_from', 'price_to'], 'number'],
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($this->status) $query->andWhere(['p.status' => $this->status]);
        if ($this->id) $query->andWhere(['p.id' => $this->id]);
        if ($this->developer_id) $query->andWhere(['p.developer_id' => $this->developer_id]);
        if ($this->category_id) $query->andWhere(['p.category_id' => $this->category_id]);

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
        if ($this->price_to) $query->orWhere(['OR',
            ['<=', 'p.price_to', $this->price_from],
            ['<=', 'p.price_to', $this->price_to]
        ]);

        if ($this->platforms) $query->andWhere(['in', 'platforms.id', $this->platforms]);
        if ($this->functions) $query->andWhere(['in', 'functions.id', $this->functions]);

        // $query->limit(3);
        $query->groupBy('p.id');

        return $dataProvider;
    }
}
