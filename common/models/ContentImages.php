<?php

namespace common\models;

use Exception;
use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "content_images".
 *
 * @property int $id
 * @property string $name
 * @property string $src
 */

class ContentImages extends \yii\db\ActiveRecord
{
    public $imageUpload;
    public function createDirectoryIfNotExists($path)
    {

        if (!file_exists($path)) {
            try {
                FileHelper::createDirectory($path);

            } catch (Exception $e) {
                return false;
            }
        }
        return true;

    }

    public function upload()
    {

        $this->src = $this->getWebPath() . $this->id . '.' . $this->imageUpload->extension;
        $this->name = $this->id . '.' . $this->imageUpload->extension;
        if ($this->validate()) {
            $path = $this->getFilePath();
            if ($this->createDirectoryIfNotExists($path)) {
                $this->imageUpload->saveAs($path . $this->id . '.' . $this->imageUpload->extension);
             return true;
            }


        } else {
            return false;
        }
    }

    public function getWebPath()
    {
        return "/images/content_images/" . $this->id . "/";
    }

    public function getFilePath()
    {
        return Yii::getAlias('@frontend') . "/web" . $this->getWebPath();
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'src'], 'string', 'max' => 256],
            [['imageUpload'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg']

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
            'src' => 'Src',
        ];
    }
}
