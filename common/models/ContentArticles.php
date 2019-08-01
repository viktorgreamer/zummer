<?php

namespace common\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;

/**
 * This is the model class for table "content_articles".
 *
 * @property int $id
 * @property int $category_id
 * @property int $category_program_id
 * @property int $do_not_show
 * @property int $is_advise
 * @property string $name
 * @property string $image
 * @property string $body
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property int $user_id
 *
 * @property ContentCategories $category
 */
class ContentArticles extends ContentNews
{

    public function rules()
    {
        return [
            [['category_id', 'name', 'body', 'user_id'], 'required'],
            [['category_id', 'created_at', 'updated_at', 'status', 'user_id'], 'integer'],
            [['body'], 'string'],
            [['status'], 'default', 'value' => 0],
            [['themes'], 'safe'],
            [['name'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContentCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['is_advise','category_program_id','do_not_show'],'integer']
        ];
    }

    public static function mapAdvises()
    {
        return [
            null => 'Нет',
            0 => 'Шапка',
            1 => 'Футер 1',
            2 => 'Футер 2',
            3 => 'Футер 3',
        ];
    }

    public function behaviors()
    {
        return [
            'saveRelations' => [
                'class' => SaveRelationsBehavior::className(),
                'relations' => [
                    'themes' => ['cascadeDelete' => true],
                ],
            ]
        ];
    }


    /**
     * @param $category_id
     * @return ContentArticles
     */
    public static function getAdviseHeader($category_id)
    {
        return ContentArticles::find()->andWhere(['category_program_id' => $category_id])->where(['is_advise' => 0])->one();
    }

    /**
     * @param $category_id
     * @return ContentArticles
     */
    public static function getAdvises($category_id)
    {
        return ContentArticles::find()->andWhere(['category_program_id' => $category_id])->where(['is_advise' => [1, 2, 3]])->all();
    }


    public function formName()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_articles';
    }

    public static function main($limit = 3)
    {
        return self::find()->limit($limit)->all();
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
            'is_advise' => 'Совет',
            'category_program_id' => 'category_program_id',
            'do_not_show' => 'Не показыать в базе знаний',
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

    public function getCategoryProgram()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_program_id']);
    }

    public function getThemes()
    {
        return $this->hasMany(ContentThemes::className(), ['id' => 'theme_id'])->via('contentThemesArticleAssignments');
    }

    public function getContentThemesArticleAssignments()
    {
        return $this->hasMany(ContentThemesArticleAssignment::className(), ['article_id' => 'id']);
    }
}
