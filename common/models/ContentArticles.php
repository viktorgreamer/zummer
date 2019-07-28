<?php

namespace common\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;

/**
 * This is the model class for table "content_articles".
 *
 * @property int $id
 * @property int $category_id
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

    public static function main($limit = 3) {
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

    public function getThemes() {
        return $this->hasMany(ContentThemes::className(),['id' => 'theme_id'])->via('contentThemesArticleAssignments');
    }

    public function getContentThemesArticleAssignments()
    {
        return $this->hasMany(ContentThemesArticleAssignment::className(), ['article_id' => 'id']);
    }
}
