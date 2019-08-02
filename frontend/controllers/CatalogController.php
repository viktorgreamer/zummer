<?php

namespace frontend\controllers;

use common\components\CompareList;
use Yii;
use common\models\Programs;
use frontend\models\ProgramsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgramsController implements the CRUD actions for Programs model.
 */
class CatalogController extends Controller
{

    /**
     * Lists all Programs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgramsSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAddToCompare($id) {
        /** @var CompareList $compareList */
        $compareList = Yii::$app->compareList;
        $compareList->add($id);

    }

    public function actionRemoveFromCompare($id) {
        /** @var CompareList $compareList */
        $compareList = Yii::$app->compareList;
        $compareList->remove($id);

    }

    /**
     * Displays a single Programs model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->popularity++;
        $model->update(false);
        return $this->render('view', [
            'model' => $model,
        ]);
    }


    /**
     * Ajax load new programs depends offset and destination_id
     * @return mixed
     */
    public function actionPopularAjax($destination_id, $offset = null)
    {
        $programs = Programs::positionOne(4, $destination_id, $offset);
        Yii::error(count($programs));
        return $this->renderAjax('/site/_destination_program_row_tab', [
            'programs' => $programs
        ]);
    }


    /**
     * Displays a Programs models to Compare.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCompare()
    {
        Yii::error(Yii::$app->compareList->get());
        return $this->render('compare');
    }


    /**
     * Finds the Programs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Programs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Programs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
