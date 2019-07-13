<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "functions".
 *
 * @property int $id
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'priority', 'description'], 'required'],
            [['priority'], 'integer'],
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
            'name' => 'Name',
            'priority' => 'Priority',
            'description' => 'Description',
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
