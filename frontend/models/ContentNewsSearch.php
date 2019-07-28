<?php

namespace frontend\models;

use common\models\ContentNews;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContentArticles;
use yii\helpers\Url;

class ContentNewsSearch extends ContentArticles
{

    public function formName()
    {
        return '';
    }

    /**
     * @var $dataProvider ActiveDataProvider
     */
    public $dataProvider;
    public $themes = [];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'created_at', 'updated_at', 'status', 'user_id'], 'integer'],
            [['name', 'body','themes','page'], 'safe'],
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
        $page = $this->dataProvider->pagination->offset;
        \Yii::error("PAGE COUNT=".$this->dataProvider->pagination->pageCount);
        \Yii::error("PAGE OFFSET=".$this->dataProvider->pagination->offset);
        \Yii::error("TOTAL COUNT=".$this->dataProvider->totalCount);

        \Yii::error("PAGE =".$page);
        if ($this->dataProvider->pagination->getPageCount() != 1 && $result = ($this->dataProvider->pagination->getPageCount() > $page)) {

            $url = Url::to(['/news/index-ajax', 'page' => ($page + 1)]);
            \Yii::error("RESULT =".$result);
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
        $query->from(['news' => ContentNews::tableName()]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 8]
        ]);

        $this->load($params);


        if ($this->category_id) {
            $query->andWhere(['news.category_id' => $this->category_id]);
        }
        if ($this->themes) {
            $query->joinWith('themes as themes');
            $query->andWhere(['in','themes.id', $this->themes]);
            $query->orderBy('news.id');
        }

        if (!$this->validate()) {
            return $this->dataProvider = $dataProvider;
        }

        return $this->dataProvider = $dataProvider;
    }
}
