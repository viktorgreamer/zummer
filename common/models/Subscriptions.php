<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subscriptions".
 *
 * @property int $id
 * @property string $email
 * @property int $is_news
 * @property int $is_articles
 * @property int $user_id
 * @property int $status
 * @property int $created_at
 */
class Subscriptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['is_news', 'is_articles', 'user_id', 'status', 'created_at'], 'integer'],
            [['email'], 'string', 'max' => 256],
            [['status'],'default', 'value' => 1],
            [['user_id'],'default', 'value' => Yii::$app->user->isGuest ? Yii::$app->user->isGuest : 0]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'is_news' => 'Is News',
            'is_articles' => 'Is Articles',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],

            ],
        ];
    }

}
