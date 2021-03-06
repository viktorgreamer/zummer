<?php

namespace backend\controllers;

use backend\models\PutMoneyFrom;
use common\models\User;
use Yii;
use common\models\Developers;
use backend\models\DevelopersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DevelopersController implements the CRUD actions for Developers model.
 */
class DevelopersController extends Controller
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
     * Lists all Developers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DevelopersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Developers model.
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
     * Displays a single Developers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPutMoney($id)
    {
        $model = new PutMoneyFrom();
        $model->developer_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->put()) {
            return $this->redirect(['view', 'id' => $model->developer_id]);
        }

        return $this->render('put_money_form', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Developers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Developers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->imageUpload = UploadedFile::getInstance($model, 'imageUpload');

            $model->upload();
            $model->update();
            if ($model->create_user) {

                if (!User::findByEmail($model->email)) {
                    $user = new User(['email' => $model->email]);
                    $user->setPassword($password = Yii::$app->security->generateRandomString(6));
                    if ($user->save()) {
                        $model->password = $password;
                        $model->update();
                    }
                } else {
                    Yii::$app->session->setFlash('error','Пользователь с EMAIL.'.$model->email." существует");
                }

            }
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing Developers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->imageUpload = UploadedFile::getInstance($model, 'imageUpload');

            $model->upload();
            $model->update();
            if ($model->create_user) {
                if (!User::findByEmail($model->email)) {
                    $user = new User(['email' => $model->email]);
                    $user->setPassword($password = Yii::$app->security->generateRandomString(6));
                    if ($user->save()) {
                        $model->password = $password;
                        $model->update();
                    }
                } else {
                    Yii::$app->session->setFlash('error','Пользователь с EMAIL.'.$model->email." существует");
                }

            }
            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Developers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionDelete($id)
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
    protected
    function findModel($id)
    {
        if (($model = Developers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
