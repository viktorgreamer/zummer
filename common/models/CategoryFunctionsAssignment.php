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

    public static function getFunctionsIdByCategory($category_id = null)
    {
        return self::find()->andFilterWhere(['category_id' => $category_id])->select('function_id')->column();
    }

    /**
     * @param null|int $category_id
     * @return Functions[]|null
     */

    public static function getFunctionsByCategory($category_id = null)
    {
        return Functions::find()
            ->where(['in', 'id',self::getFunctionsIdByCategory($category_id)])
            ->all();
    }

    /**
     * @param null|int $category_id
     * @return array
     */
    public static function getGroupedFunctions($category_id = null)
    {
        $groupedFunctions = [];
        if ($functions = self::getFunctionsByCategory($category_id)) {
            foreach ($functions as $function) {
                $groupedFunctions[Functions::mapTypes()[$function->type_id]][] = $function;
            }
        }

        return $groupedFunctions;

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
