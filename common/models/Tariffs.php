<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tariffs".
 *
 * @property int $id
 * @property string $name Название
 * @property int $category_id Категория
 * @property int $group_id Группа тарифов
 * @property int $rate Ставка
 * @property Categories $category Категория
 */
class Tariffs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tariffs';
    }

    public static function mapGroups()
    {
        return [
            1 => 'Базовый',
            2 => 'Максимум'
        ];
    }

    public static function map()
    {
        return ArrayHelper::map(self::find()->all(), 'id','name');
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'group_id', 'rate'], 'integer'],
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
            'name' => 'Название',
            'category_id' => 'Категория',
            'group_id' => 'Группа тарифов',
            'rate' => 'Ставка',
        ];
    }
}
