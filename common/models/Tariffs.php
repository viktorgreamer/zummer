<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tariffs".
 *
 * @property int $id
 * @property string $name Название
 * @property int $category_id Категория
 * @property int $rate Ставка
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'rate'], 'integer'],
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
            'rate' => 'Ставка',
        ];
    }
}
