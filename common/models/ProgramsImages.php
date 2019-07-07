<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "programs_images".
 *
 * @property int $id
 * @property int $program_id
 * @property string $src
 * @property int $priority
 */
class ProgramsImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programs_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['src'], 'required'],
            [['priority'], 'number'],
            [['src'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'program_id' => 'Program ID',
            'src' => 'Src',
            'priority' => 'Priority',
        ];
    }
}
