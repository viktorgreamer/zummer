<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content_themes_article_assignment".
 *
 * @property int $article_id
 * @property int $theme_id
 *
 * @property ContentArticles $article
 * @property ContentThemes $theme
 */
class ContentThemesArticleAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_themes_article_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'theme_id'], 'required'],
            [['article_id', 'theme_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContentArticles::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['theme_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContentThemes::className(), 'targetAttribute' => ['theme_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'theme_id' => 'Theme ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(ContentArticles::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheme()
    {
        return $this->hasOne(ContentThemes::className(), ['id' => 'theme_id']);
    }
}
