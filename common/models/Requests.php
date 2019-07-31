<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property int $type_id Тип запроса
 * @property string $from от
 * @property string $body Запрос
 */
class Requests extends \yii\db\ActiveRecord
{
    const TYPE_CONSULTATION_REQUEST = 1 ;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id'], 'integer'],
            [['body'], 'string'],
            [['from'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Тип запроса',
            'from' => 'от',
            'body' => 'Запрос',
        ];
    }
}
