<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "developers".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $site
 * @property string $description
 * @property string $country
 * @property double $foundation_year
 * @property DevelopersAwardsImages[] $awards
 */
class Developers extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'developers';
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
            [['name', 'site', 'description', 'country', 'foundation_year'], 'required'],
            [['description'], 'string'],
            [['foundation_year'], 'integer'],
            [['name', 'site'], 'string', 'max' => 256],
            [['country'], 'string', 'max' => 150],
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
            'site' => 'Site',
            'description' => 'Description',
            'country' => 'Country',
            'foundation_year' => 'Foundation Year',
        ];
    }

    public function getPrograms()
    {
        return $this->hasMany(Programs::className(), ['developer_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getAwards()
    {
        return $this->hasMany(DevelopersAwardsImages::className(), ['developer_id' => 'id']);
    }
}
