<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "functions".
 *
 * @property int $id
 * @property int $type_id
 * @property string $name
 * @property int $priority
 * @property string $description
 *
 * @property FunctionsAssignment $id0
 */

class Functions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'functions';
    }

    public static function mapTypes() {
        return [
            1 => "Crm-Аналитика",
            2 => "Интеграция",
            3 => "Телефония",
            4 => "Продажи",
            5 => "Управление рекламными каналами",
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'priority', 'description','type_id'], 'required'],
            [['priority','type_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 256],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => FunctionsAssignment::className(), 'targetAttribute' => ['id' => 'function_id']],
        ];
    }

    public static function map() {
        return ArrayHelper::map(self::find()->all(), 'id','name');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'priority' => 'Приоритет',
            'description' => 'Описание',
            'type_id' => 'Тип',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(FunctionsAssignment::className(), ['function_id' => 'id']);
    }
}
