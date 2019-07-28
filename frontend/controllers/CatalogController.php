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
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Ajax load new programs depends offset and destination_id
     * @return mixed
     */
    public function actionPopularAjax($destination_id, $offset = null)
    {
        $programs = Programs::main(4, $destination_id, $offset);
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
     * Creates a new Programs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Programs();
        $model->developer_id = Yii::$app->user->identity->developer->id;
        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Programs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->developer_id = Yii::$app->user->identity->developer->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Programs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
