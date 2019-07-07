<?php

namespace frontend\modules\dev\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Programs;

/**
 * ProgramsSearch represents the model behind the search form of `common\models\Programs`.
 */
class ProgramsSearch extends Programs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at', 'developer_id', 'has_month_plan', 'has_year_plan', 'has_free', 'has_trial', 'category_id'], 'integer'],
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

        $query->where(['developer_id' => \Yii::$app->user->identity->developer->id]);

        return $dataProvider;
    }
}
