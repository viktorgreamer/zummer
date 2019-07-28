<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContentArticles;
use yii\helpers\Url;

/**
 * ContentArticlesSearch represents the model behind the search form of `common\models\ContentArticles`.
 */
class ContentArticlesSearch extends ContentNewsSearch
{


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
        if ($this->dataProvider->pagination && $this->dataProvider->pagination->getPageCount() != 1 && $result = ($this->dataProvider->pagination->getPageCount() > $page)) {

            $url = Url::to(['/articles/index-ajax', 'page' => ($page + 1)]);
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
        $query = ContentArticles::find();

        $query->from(['articles' => ContentArticles::tableName()]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 8]
        ]);

        $this->load($params);


        if ($this->category_id) {
            $query->andWhere(['articles.category_id' => $this->category_id]);
        }
        if ($this->themes) {
            $query->joinWith('themes as themes');
            $query->andWhere(['in','themes.id', $this->themes]);
            $query->orderBy('articles.id');
        }

        if (!$this->validate()) {
            return $this->dataProvider = $dataProvider;
        }




        return $dataProvider;
    }
}
