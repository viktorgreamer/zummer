<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Categories;

/**
 * CategoriesSearch represents the model behind the search form of `common\models\Categories`.
 */
class CategoriesSearch extends Categories
{
    public $query;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['query'], 'string'],
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
        $query = Categories::find();
        $query->from(['cat' => Categories::tableName()]);
        $query->joinWith(['programs as p']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params,'');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        if ($this->query) $query->where(['OR',
            ['like', 'cat.name', $this->query],
            ['like', 'cat.description', $this->query],
        ]);

        $query->groupBy('cat.id');

        return $dataProvider;
    }
}
