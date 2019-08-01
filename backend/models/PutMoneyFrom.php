<?php

namespace backend\models;

use common\models\Developers;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class PutMoneyFrom extends Model
{
    public $developer_id;
    public $amount;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['developer_id', 'amount'], 'required'],
            [['developer_id', 'amount'], 'integer'],
            // rememberMe must be a boolean value
            // rememberMe must be a boolean value

        ];
    }


    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function put()
    {
        if ($developer = Developers::findOne($this->developer_id)) {
            $developer->billing += $this->amount;
            $developer->update();
            return true;
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
