<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "functions_assignment".
 *
 * @property int $program_id
 * @property int $function_id
 *
 * @property Functions $functions
 * @property Programs $programs
 */
class FunctionsAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'functions_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id', 'function_id'], 'required'],
            [['program_id', 'function_id'], 'integer'],
            [['program_id', 'function_id'], 'unique', 'targetAttribute' => ['program_id', 'function_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'program_id' => 'Program ID',
            'function_id' => 'Function ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunctions()
    {
        return $this->hasOne(Functions::className(), ['id' => 'function_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasOne(Programs::className(), ['id' => 'program_id']);
    }
}
