<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "platforms_assignment".
 *
 * @property int $program_id
 * @property int $platform_id
 *
 * @property Platforms $platform
 * @property Programs $program
 */
class PlatformsAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platforms_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id', 'platform_id'], 'required'],
            [['program_id', 'platform_id'], 'integer'],
            [['program_id', 'platform_id'], 'unique', 'targetAttribute' => ['program_id', 'platform_id']],
            [['platform_id'], 'exist', 'skipOnError' => true, 'targetClass' => Platforms::className(), 'targetAttribute' => ['platform_id' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programs::className(), 'targetAttribute' => ['program_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'program_id' => 'Program ID',
            'platform_id' => 'Platform ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(Platforms::className(), ['id' => 'platform_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Programs::className(), ['id' => 'program_id']);
    }
}
