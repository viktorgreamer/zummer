<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class UpdateUserForm extends Model
{
    public $last_name;
    public $first_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name','first_name'], 'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @param int $user_id
     * @return bool whether the creating new account was successful and email was sent
     */
    public function updateUser($user_id)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::findOne($user_id);
        $user->last_name = $this->last_name;
        $user->first_name = $this->first_name;
        return $user->save();

    }

}
