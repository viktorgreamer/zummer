<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "content_themes".
 *
 * @property int $id
 * @property string $name Название
 * @property int $order Порядок
 *
 * @property ContentThemesArticleAssignment[] $contentThemesArticleAssignments
 * @property ContentThemesNewsAssignment[] $contentThemesNewsAssignments
 */
class ContentThemes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_themes';
    }

    public static function map()
    {
        return ArrayHelper::map(self::find()->all(),'id','name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['order'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentThemesArticleAssignments()
    {
        return $this->hasMany(ContentThemesArticleAssignment::className(), ['theme_id' => 'id']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContentThemesNewsAssignments()
    {
        return $this->hasMany(ContentThemesNewsAssignment::className(), ['theme_id' => 'id']);
    }
}
