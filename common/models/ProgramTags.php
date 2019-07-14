<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "program_tags".
 *
 * @property int $id
 * @property int $program_id
 * @property string $name
 * @property string $link
 * @property int $order
 *
 * @property Programs $program
 */
class ProgramTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id', 'order'], 'integer'],
            [['link'], 'string'],
            [['name'], 'string', 'max' => 70],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programs::className(), 'targetAttribute' => ['program_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'program_id' => 'Program ID',
            'name' => 'Name',
            'link' => 'Link',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Programs::className(), ['id' => 'program_id']);
    }
}
