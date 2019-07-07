<?php

namespace app\modules\dev\controllers;

use common\models\ProgramsImages;
use Yii;
use common\models\Programs;
use frontend\modules\dev\models\ProgramsSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProgramsController implements the CRUD actions for Programs model.
 */
class ProgramsController extends Controller
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


        if ($model->load(Yii::$app->request->post())) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }


        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDeleteImages($program_id, $id)
    {

        if ($program = Programs::findOne($program_id)) {
            ProgramsImages::deleteAll(['program_id' => $program_id, 'id' => $id]);
        }

        if ($program_id) return $this->redirect(['view', 'id' => $program_id]);

    }

    public function actionChangeImagesPriority($program_id, $id, $direction)
    {

        if ($program = Programs::findOne($program_id)) {
            if ($count = count($program->images)) {
                /* @var $images ProgramsImages */
                $images = $program->images;
                foreach ($images as $key => $image) {
                    Yii::error($image->toArray());
                    if ($image->id == $id) {
                        if (($direction == 'up') and ($key !== 0)) {
                            Yii::error(' SET TO ID ' . $id . " PRIORITY " . ($image->priority - 1.2));
                            ProgramsImages::updateAll(['priority' => ($image->priority - 1.2)], ['id' => $id]);
                            break;
                        }
                        if (($direction == 'down') and ($key !== ($count - 1))) {
                            ProgramsImages::updateAll(['priority' => ($image->priority + 1.2)], ['id' => $id]);
                            break;
                        }
                    };
                }
                $program->resetImagesPriority();
            }

        }

        if ($program_id) return $this->redirect(['view', 'id' => $program_id]);

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
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                if ($model->save(false)) {
                    return $this->redirect(['index']);
                }

            }
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
