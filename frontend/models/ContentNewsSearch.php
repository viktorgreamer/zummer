<?php

namespace frontend\models;

use common\models\ContentNews;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContentArticles;
use yii\helpers\Url;

class ContentNewsSearch extends ContentArticles
{

    /**
     * @var $dataProvider ActiveDataProvider
     */
    public $dataProvider;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'created_at', 'updated_at', 'status', 'user_id'], 'integer'],
            [['name', 'body'], 'safe'],
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
     *
     */
    public function getShowMore()
    {
        if ($this->dataProvider->pagination->pageCount > ($page = $this->dataProvider->pagination->offset)) {

            $url = Url::to(['/news/index-ajax', 'page' => ($page + 1)]);
            \Yii::error($this->dataProvider->pagination->pageCount);
            \Yii::error($this->dataProvider->pagination->offset);
            \Yii::error($this->dataProvider->totalCount);
            $html = <<<HTML
    <div class="see_more" value="$url">
    <a href="#" class="active"  class="see_more_link"> Смотреть еще <img alt = "" src = "/img/load.png"></a>
</div>
<div class='load_after_me'></div>
HTML;
            return $html;
        }
        return '';


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
        $query = ContentNews::find();

// add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 8]
        ]);

        $this->load($params);

        if (!$this->validate()) {
// uncomment the following line if you do not want to return any records when validation fails
// $query->where('0=1');
            return $this->dataProvider = $dataProvider;
        }


        return $this->dataProvider = $dataProvider;
    }
}
