<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reviews;

/**
 * ReviewsSearch represents the model behind the search form of `common\models\Reviews`.
 */
class ReviewsSearch extends Reviews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'program_id', 'user_id', 'using_time', 'rating_convenience', 'rating_functions', 'rating_support', 'created_at', 'status'], 'integer'],
            [['title', 'pluses', 'minuses', 'common'], 'safe'],
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
        $query = Reviews::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'program_id' => $this->program_id,
            'user_id' => $this->user_id,
            'using_time' => $this->using_time,
            'rating_convenience' => $this->rating_convenience,
            'rating_functions' => $this->rating_functions,
            'rating_support' => $this->rating_support,
            'created_at' => $this->created_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'pluses', $this->pluses])
            ->andFilterWhere(['like', 'minuses', $this->minuses])
            ->andFilterWhere(['like', 'common', $this->common]);

        return $dataProvider;
    }
}
