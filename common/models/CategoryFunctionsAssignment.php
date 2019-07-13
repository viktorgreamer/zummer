<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category_functions_assignment".
 *
 * @property int $category_id
 * @property int $function_id
 *
 * @property Categories $category
 * @property Functions $function
 */
class CategoryFunctionsAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_functions_assignment';
    }

    public static function getFunctionsByCategory($category_id) {
        return Functions::find()
            ->where(['in','id',self::find()->where(['category_id' => $category_id])->select('function_id')->column()])
            ->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'function_id'], 'required'],
            [['category_id', 'function_id'], 'integer'],
            [['category_id', 'function_id'], 'unique', 'targetAttribute' => ['category_id', 'function_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['function_id'], 'exist', 'skipOnError' => true, 'targetClass' => Functions::className(), 'targetAttribute' => ['function_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'function_id' => 'Function ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunction()
    {
        return $this->hasOne(Functions::className(), ['id' => 'function_id']);
    }
}
