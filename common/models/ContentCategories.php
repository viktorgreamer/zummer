<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "content_categories".
 *
 * @property int $id
 * @property string $name
 *
 * @property ContentArticles[] $contentArticles
 * @property ContentNews[] $contentNews
 */
class ContentCategories extends \yii\db\ActiveRecord
{

    public static function map()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentArticles()
    {
        return $this->hasMany(ContentArticles::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentNews()
    {
        return $this->hasMany(ContentNews::className(), ['category_id' => 'id']);
    }
}
