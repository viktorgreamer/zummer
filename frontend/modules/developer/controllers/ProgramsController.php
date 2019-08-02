<?php

namespace app\modules\developer\controllers;

use common\models\ProgramsAwardsImages;
use common\models\ProgramsImages;

use Yii;
use common\models\Programs;
use frontend\modules\developer\models\ProgramsSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;
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

    public function actionUploadLogo($id)
    {
        /** @var Programs $model */
        if (Yii::$app->user->identity) {
            $model = $this->findModel($id);
            $model->imageUpload = UploadedFile::getInstance($model, 'imageUpload');
            if ($model->uploadLogo()) {
                if ($model->save(false)) {
                    return $this->goBack();
                }
                return $this->goBack();
            }


        } else throw new HttpException('Что-то пошло не так.');
        return $this->goBack();

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
        return $this->render('update', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionModerate($id)
    {

        $model = $this->findModel($id);
        $model->status = Programs::STATUS_WAIT_MODERATION;
        $model->update();

        return $this->render('update', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionPaid($id, $tariff_id)
    {
        $model = $this->findModel($id);
        $model->tariff_id = $tariff_id;
        $model->dueDate = date('Y-m-d', time() + 30 * 24 * 3600);
        $model->update();
        return $this->render('update', [
            'model' => $model,
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


        if ($model->load(Yii::$app->request->post(), '')) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                if ($model->save()) {
                    return $this->redirect(['programs/view', 'id' => $model->id]);
                }
            }


        }

        Yii::error($model->errors);
        Yii::error($model->toArray());

        return $this->render('create', [
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
        if ($model->load(Yii::$app->request->post(), '')) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $model->imageAwardsFiles = UploadedFile::getInstances($model, 'imageAwardsFiles');
            Yii::error($model->imageFiles);
            if ($model->upload()) {
                if ($model->save(false)) {
                    return $this->redirect(['programs/view', 'id' => $model->id]);
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
