<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 28.07.2019
 * Time: 17:25
 */

namespace frontend\modules\developer\models;


use common\models\Developers;
use common\models\Programs;
use common\models\User;
use Yii;
use yii\base\Model;

class DevelopersRegistrationForm extends Model
{

    public $email;
    public $first_name;
    public $last_name;
    public $site;
    public $phone;
    public $password;
    public $rememberMe = true;
    public $program_name;
    public $program_category_id;
    public $program_description;
    public $program_phone;
    public $program_site;
    public $marketing_interested;
    public $lead_generation_interested;

    private $_user;
    private $_developer;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['first_name', 'last_name', 'program_name', 'program_description'], 'string', 'max' => 256],
            [['site', 'program_site'], 'url'],
            [
                ['phone', 'program_phone'], 'string',
                /*  'pattern' => '\+[]',
                  'message' => 'Введите корректное знавение телефона'*/
            ],
            ['lead_generation_interested', 'integer'],
            ['marketing_interested', 'integer'],
            ['program_category_id', 'integer']
        ];
    }

    public function createDeveloperProfile()
    {
        $this->_developer = new Developers(
            [
                'phone' => $this->phone,
                'user_id' => $this->_user->id,
                'email' => $this->email,
                'site' => $this->site,
            ]);
        if ($this->_developer->save()) return true;
        else {
            Yii::error($this->_developer->errors);
            return false;
        }
    }

    public function createProgram()
    {
        $developer = new Programs(
            [
                'developer_id' => $this->_developer->id,
                'phone' => $this->program_phone,
                'name' => $this->program_name,
                'category_id' => $this->program_category_id,
                'description_short' => $this->program_description,
                'link' => $this->program_site,
            ]);

        if ($developer->save()) return true;
        else {
            Yii::error($developer->errors);
            return false;
        }
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */


    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->is_developer = 1;
        $user->last_name = $this->last_name;
        $user->first_name = $this->first_name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;
        $this->_user = $user;
        return $user->save() && $this->assignRole($user);
    }

    public function assignRole(User $user)
    {
        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole('developer'), $user->id);
        return true;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */

    protected function sendEmail($user)
    {
        try {
            $result = Yii::$app
                ->mailer
                ->compose(
                    ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                    ['user' => $user]
                )
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                ->setTo($this->email)
                ->setSubject('Account registration at ' . Yii::$app->name)
                ->send();
        } catch (\Exception $exception) {

            $this->_user->status = 10;
            $this->_user->update();
        }


    }


}