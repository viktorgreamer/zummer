<?php

namespace app\modules\developer\controllers;

use frontend\modules\developer\models\PasswordResetRequestForm;
use frontend\modules\developer\models\DeveloperLoginForm;
use common\models\User;
use frontend\modules\developer\models\DevelopersRegistrationForm;
use frontend\modules\developer\models\ResetPasswordForm;
use InvalidArgumentException;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Default controller for the `developer` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        /** @var User $user */
        if (($user = \Yii::$app->user->identity) && ($model = $user->developer)) {
            return $this->render('index', ['model' => $model]);
        } else {
            return $this->redirect('login');
        }

    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionReviews()
    {
        /** @var User $user */
        if (($user = \Yii::$app->user->identity) && ($model = $user->developer)) {
            return $this->render('reviews', ['model' => $model]);
        } else {
            return $this->redirect('login');
        }

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new DeveloperLoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $this->redirect('/developer/default/index');
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['/developer/login']);
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionRegistration()
    {
        $model = new DevelopersRegistrationForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->signup()) {
           if  (!$model->createDeveloperProfile()) {

           };
            $model->createProgram();
            Yii::$app->session->setFlash('success', 'Ваша регистрация выполнена. Следуйте инструкциям указанным в электронной почте указанной при регистрации.');
            return $this->redirect(['/developer/login']);
        }
        if ($model->errors) {
            foreach ($model->errors as $error) {
                Yii::$app->session->setFlash('success',$error);
                Yii::error($error);
            }
        };

        return $this->render('registration', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }



}
