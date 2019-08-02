<?php

namespace common\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
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

    public function formName()
    {
        return '';
    }

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
            'saveRelations' => [
                'class' => SaveRelationsBehavior::className(),
                'relations' => [
                    'themes' => ['cascadeDelete' => true],
                ],
            ]

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

    /** replacing table tag to class='table table-hover'
     * @return string|string[]|null
     */
    public function getFullBody() {
        return preg_replace("/<table.+>/u"," <table class='table table-hover'>", $this->body);
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
            [['themes'],'safe'],
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
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ContentCategories::className(), ['id' => 'category_id']);
    }

    public function getThemes() {
        return $this->hasMany(ContentThemes::className(),['id' => 'theme_id'])->via('contentThemesNewsAssignments');
    }

    public function getContentThemesNewsAssignments()
    {
        return $this->hasMany(ContentThemesNewsAssignment::className(), ['new_id' => 'id']);
    }

}
