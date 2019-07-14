<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "developers_awards_images".
 *
 * @property int $developer_id
 * @property int $priority
 * @property string $src
 * @property string $description
 */
class DevelopersAwardsImages extends \yii\db\ActiveRecord
{
    public function createDirectoryIfNotExists($path)
    {
        if (!file_exists($path)) {
            Yii::error('create path');
            FileHelper::createDirectory($path);
        } else {
            Yii::error(' path EXISTS');
        }

    }

    public function getWebPath()
    {
        return "/images/developers/" . $this->developer_id . "/awards/";
    }

    public function getFilePath()
    {
        return Yii::getAlias('@frontend') . "/web" . $this->getWebPath();
    }

    public $imageUpload;

    public function upload()
    {

        $this->src = $this->getWebPath() . $this->imageUpload->baseName . '.' . $this->imageUpload->extension;

        if ($this->validate()) {
            $path = $this->getFilePath();
            $this->createDirectoryIfNotExists($path);
            $this->imageUpload->saveAs($path . $this->imageUpload->baseName . '.' . $this->imageUpload->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'developers_awards_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['developer_id', 'src', 'description'], 'required'],
            [['developer_id', 'priority'], 'integer'],
            [['description'], 'string'],
            ['priority', 'safe'],
            [['src'], 'string', 'max' => 256],
            ['imageUpload', 'file', 'extensions' => 'jpeg,jpg,bmp,gif,png'],
        ];
    }

    public function beforeValidate()
    {
        $this->priority = intval(self::find()->where(['developer_id' => $this->developer_id])->max('priority')) + 1;
        return parent::beforeValidate();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'developer_id' => 'Developer ID',
            'priority' => 'Priority',
            'src' => 'Src',
            'description' => 'Description',
        ];
    }
}
