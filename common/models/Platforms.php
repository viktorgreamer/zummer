<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "platforms".
 *
 * @property int $id
 * @property string $name
 *
 * @property PlatformsAssignment[] $platformsAssignments
 * @property Programs[] $programs
 */
class Platforms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platforms';
    }

    public static function map() {
        return ArrayHelper::map(self::find()->all(), 'id','name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatformsAssignments()
    {
        return $this->hasMany(PlatformsAssignment::className(), ['platform_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Programs::className(), ['id' => 'program_id'])->viaTable('platforms_assignment', ['platform_id' => 'id']);
    }
}
