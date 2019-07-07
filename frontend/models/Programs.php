<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programs".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $video_link
 * @property string $destination
 * @property string $description
 * @property double $rating
 * @property double $rating_convenience
 * @property double $rating_functions
 * @property double $rating_support
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $developer_id
 * @property string $support
 * @property string $learning
 * @property double $price_from
 * @property double $price_to
 * @property string $prices
 * @property int $has_month_plan
 * @property int $has_year_plan
 * @property int $has_free
 * @property int $has_trial
 * @property string $trial_link
 *
 * @property FunctionsAssignment $id0
 */
class Programs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'video_link', 'destination', 'description', 'created_at', 'updated_at', 'developer_id', 'support', 'learning'], 'required'],
            [['destination', 'description', 'support', 'learning', 'prices', 'trial_link'], 'string'],
            [['rating', 'rating_convenience', 'rating_functions', 'rating_support', 'price_from', 'price_to'], 'number'],
            [['status', 'created_at', 'updated_at', 'developer_id', 'has_month_plan', 'has_year_plan', 'has_free', 'has_trial'], 'integer'],
            [['name', 'link', 'video_link'], 'string', 'max' => 256],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => FunctionsAssignment::className(), 'targetAttribute' => ['id' => 'program_id']],
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
            'link' => 'Link',
            'video_link' => 'Video Link',
            'destination' => 'Destination',
            'description' => 'Description',
            'rating' => 'Rating',
            'rating_convenience' => 'Rating Convenience',
            'rating_functions' => 'Rating Functions',
            'rating_support' => 'Rating Support',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'developer_id' => 'Developer ID',
            'support' => 'Support',
            'learning' => 'Learning',
            'price_from' => 'Price From',
            'price_to' => 'Price To',
            'prices' => 'Prices',
            'has_month_plan' => 'Has Month Plan',
            'has_year_plan' => 'Has Year Plan',
            'has_free' => 'Has Free',
            'has_trial' => 'Has Trial',
            'trial_link' => 'Trial Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(FunctionsAssignment::className(), ['program_id' => 'id']);
    }
}
