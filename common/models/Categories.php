<?php

namespace common\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property Programs[] $programs
 * @property Functions[] $functions
 */
class Categories extends \yii\db\ActiveRecord
{

    public $functions_map;

    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'categories';
    }

    public static function getPopular($limit = 8) {
        return self::find()->limit($limit)->all();
    }

    public function behaviors()
    {
        return [
            [
                'class' => SaveRelationsBehavior::className(),
                'relations' => [
                    'functions' => ['cascadeDelete' => true],
                ],
            ],
        ];
    }


    public function getFunctions()
    {
        return $this->hasMany(Functions::className(), ['id' => 'function_id'])
            ->viaTable(CategoryFunctionsAssignment::tableName(), ['category_id' => 'id']);
    }


    public static function map()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['functions'], 'safe'],
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
            'description' => 'Description',
        ];
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Programs::className(), ['category_id' => 'id']);
    }
}
