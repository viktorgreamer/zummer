<?php

namespace common\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "developers".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $logo
 * @property string $site
 * @property string $description
 * @property string $address1
 * @property string $country
 * @property string $address2
 * @property string $postcode
 * @property string $phone
 * @property string $city
 * @property string $office_country
 * @property string $email
 * @property double $foundation_year
 * @property Profile $profile
 * @property UploadedFile $imageUpload
 * @property Reviews $reviews
 */
class Developers extends ActiveRecord
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

    public function getWebPath()
    {
        return "/images/developers/" . $this->id . "/";
    }

    public function getFilePath()
    {
        return Yii::getAlias('@frontend') . "/web" . $this->getWebPath();
    }


    public function upload()
    {

        $this->logo = $this->getWebPath() . "logo" . '.' . $this->imageUpload->extension;

        if ($this->validate()) {
            $path = $this->getFilePath();
            if ($this->createDirectoryIfNotExists($path)) {
                Yii::error($this->logo);
                $this->imageUpload->saveAs($path . "logo" . '.' . $this->imageUpload->extension);
                return true;
            }


        } else {
            Yii::error(" NOT VALIDATED");
            return false;
        }
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'developers';
    }

    public static function countries()
    {
        return [
            'Россия' => 'Россия',
            'Казахстан' => 'Казахстан',
            'Украина' => 'Украина',
            'Белоруссия' => 'Белоруссия'
        ];
    }


    public static function map()
    {
        return ArrayHelper::map(Developers::find()->all(), 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'address1', 'address2', 'phone', 'city', 'office_country', 'email', 'logo'], 'string'],
            [['foundation_year'], 'integer', 'max' => 2050],
            [['name', 'site'], 'string', 'max' => 256],
            [['country'], 'string', 'max' => 150],
            [['logo'], 'string', 'max' => 256],
            ['imageUpload', 'file', 'extensions' => 'jpeg,jpg,bmp,gif,png'],
        ];
    }

    public $attributesToFill = [
        'name' => 'Название',
        'site' => 'Сайт',
        'description' => 'Описание',
        'country' => 'Страна',
        'foundation_year' => 'Год основания',
        'address1' => 'Адрес офиса',
        'city' => 'Город',
        'phone' => 'Телефон',
        'office_country' => 'Офис в ',
        'email' => 'Email',
        'logo' => 'Фото логотипа',
    ];

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'site' => 'Site',
            'description' => 'Description',
            'country' => 'Country',
            'foundation_year' => 'Foundation Year',
            'address' => 'Foundation Year',
            'phone' => 'Телефон',
            'logo' => 'Логотип',
        ];
    }

    public function getLogo()
    {
        return $this->logo ?: '/img/no_logo.png';
    }

    public function getPrograms()
    {
        return $this->hasMany(Programs::className(), ['developer_id' => 'id']);
    }

    public function getProfile()
    {
        return (new Profile($this));
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return Reviews[]
     */
    public function getReviews()
    {
        return Reviews::find()->where(
            [
                'program_id' => $this->getPrograms()
                    ->select('id')
                    ->column()
            ])->all();
    }


}
