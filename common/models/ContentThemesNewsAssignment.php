<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content_themes_news_assignment".
 *
 * @property int $new_id
 * @property int $theme_id
 *
 * @property ContentNews $new
 * @property ContentThemes $theme
 */
class ContentThemesNewsAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_themes_news_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_id', 'theme_id'], 'required'],
            [['new_id', 'theme_id'], 'integer'],
            [['new_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContentNews::className(), 'targetAttribute' => ['new_id' => 'id']],
            [['theme_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContentThemes::className(), 'targetAttribute' => ['theme_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'new_id' => 'New ID',
            'theme_id' => 'Theme ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNew()
    {
        return $this->hasOne(ContentNews::className(), ['id' => 'new_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheme()
    {
        return $this->hasOne(ContentThemes::className(), ['id' => 'theme_id']);
    }
}
