<?php

namespace frontend\controllers;

use common\models\AggregateSearch;
use Yii;
use common\models\ContentArticles;
use frontend\models\ContentArticlesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticlesController implements the CRUD actions for ContentArticles model.
 */
class SearchController extends Controller
{
    /**
     * Lists all ContentArticles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AggregateSearch();
        $searchModel->search();

        return $this->renderPartial('index', [
            'searchModel' => $searchModel
        ]);
    }

}
