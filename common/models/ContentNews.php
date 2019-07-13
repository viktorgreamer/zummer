<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "content_news".
 *
 * @property int $id
 * @property int $category_id
 * @property string $image
 * @property string $name
 * @property string $body
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $user_id
 *
 * @property ContentCategories $category
 */
class ContentNews extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],

            ],

        ];
    }

    public static function findLast($count = 3)
    {
        $query = static::find()->orderBy(['created_at' => SORT_DESC]);
        if ($count) $query->limit($count);
        return $query->all();
    }

    public static function tabClasses() {
        return [
            "col-md-6 col-lg-4",
            "d-none d-md-block col-md-6 col-lg-4 biggest",
            "d-none d-lg-block col-lg-4"
        ];
    }

    public function getBody() {
        return mb_strimwidth($this->body, 0, 400, '...');
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'body', 'user_id'], 'required'],
            [['category_id', 'created_at', 'updated_at', 'status', 'user_id'], 'integer'],
            [['body'], 'string'],
            [['status'], 'default','value' => 0],
            [['name'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContentCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function beforeValidate()
    {

        if (!$this->user_id) $this->user_id = Yii::$app->user->id;
        return parent::beforeValidate();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ContentCategories::className(), ['id' => 'category_id']);
    }
}
