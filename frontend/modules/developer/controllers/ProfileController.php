<?php

namespace app\modules\developer\controllers;

use common\models\ProgramsAwardsImages;
use common\models\User;
use frontend\models\UpdateUserForm;
use frontend\models\UploadAwardsForm;
use Yii;
use common\models\Developers;
use frontend\modules\developer\models\DevelopersSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DevelopersController implements the CRUD actions for Developers model.
 */
class ProfileController extends Controller
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
     * Displays a single Developers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionIndex()
    {
        return $this->render('view', [
            'model' => Developers::find()->where(['user_id' => Yii::$app->user->id])->one(),
            'user' => User::findOne(Yii::$app->user->id)
        ]);
    }

    /**
     * Updates an existing Developers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        }
        $updateUserForm = new UpdateUserForm();
        $updateUserForm->load(Yii::$app->request->post());
        $updateUserForm->updateUser($model->user_id);


        return $this->redirect('index');
    }

    public function actionUpdateAwards()
    {

        if ($developer = Yii::$app->user->identity->developer) {
            $model = new ProgramsAwardsImages();
            $model->developer_id = $developer->id;

            if ($model->load(Yii::$app->request->post())) {
                $model->imageUpload = UploadedFile::getInstance($model, 'imageUpload');
                if ($model->upload()) {
                    if ($model->save(false)) {
                        return $this->redirect(['index']);
                    }

                }
            }


            return $this->render('update_awards', [
                'model' => $model,
            ]);
        } else throw new HttpException('Создайте профайл.');

    }

    public function actionUploadLogo()
    {
        /** @var Developers $developer */
        if (Yii::$app->user->identity && $developer = Yii::$app->user->identity->developer) {
            $model = $this->findModel($developer->id);

            $model->imageUpload = UploadedFile::getInstance($model, 'imageUpload');

            if ($model->upload()) {
                if ($model->save(false)) {
                    return $this->redirect(['index']);
                }
                return $this->redirect(['index']);
            }


        } else throw new HttpException('Что-то пошло нетак.');
        return $this->redirect(['index']);

    }

    public function actionDeleteAwards($developer_id, $priority)
    {
        ProgramsAwardsImages::deleteAll(['developer_id' => $developer_id, 'priority' => $priority]);
        if ($developer_id) return $this->redirect(['index']);

    }

    /**
     * Deletes an existing Developers model.
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
     * Finds the Developers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Developers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Developers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
