<?php

namespace backend\controllers;

use common\models\ProgramsAwardsImages;
use common\models\ProgramsImages;
use Yii;
use common\models\Programs;
use backend\models\ProgramsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProgramsUploadController implements the CRUD actions for Programs model.
 */
class ProgramsUploadController extends Controller
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
     * Creates a new Programs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Programs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->imageUpload = UploadedFile::getInstance($model, 'imageUpload');
            if ($model->imageUpload) $model->uploadLogo();
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $model->imageAwardsFiles = UploadedFile::getInstances($model, 'imageAwardsFiles');
            $model->upload();

            if ($model->save()) {

            }

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            $model->imageUpload = UploadedFile::getInstance($model, 'imageUpload');
            if ($model->imageUpload) $model->uploadLogo();
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $model->imageAwardsFiles = UploadedFile::getInstances($model, 'imageAwardsFiles');
            $model->upload();

            if ($model->save()) {

            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDeleteImages($id)
    {

        /** @var ProgramsImages $image */
        if (($image = ProgramsImages::findOne($id)) && $image->delete()) return 1;

        return 0;


    }

    public function actionDeleteImagesAwards($id)
    {
        if (($image = ProgramsAwardsImages::findOne($id)) && $image->delete()) return 1;
        return 0;

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
