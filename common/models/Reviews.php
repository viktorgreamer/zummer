<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int $program_id
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property string $pluses
 * @property string $minuses
 * @property string $common
 * @property int $user_id
 * @property int $using_time
 * @property int $rating_convenience
 * @property int $rating_common
 * @property int $rating_functions
 * @property int $rating_support
 * @property int $created_at
 * @property int $status
 * @property User user
 * @property string $industry
 * @property string $position
 */
class Reviews extends \yii\db\ActiveRecord
{

    public static function mapStatuses()
    {
        return [
            0 => 'Не промодерирован',
            1 => 'Одобрен',
            2 => "Отклонен"
        ];
    }

    public function getRating()
    {
        return round(($this->rating_support + $this->rating_functions = $this->rating_convenience) / 3);
    }

    public static function isIn($star, $rating)
    {
        return $star <= $rating;
    }

    public static function renderStar($id, $rating)
    {
        $class = self::isIn($id, $rating) ? "full" : "empty";
        return "<span data-star='$id' class='$class'></span>";
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    public function apply()
    {
        $this->status = 1;
        $this->update(false);

    }

    public static function main($limit = 5)
    {
        return Reviews::find()->limit($limit)->all();
    }

    public static function mainOne($program_id)
    {
        return Reviews::find()->where(['program_id' => $program_id])->one();
    }

    public function deny()
    {
        $this->status = 2;
        $this->update(false);
    }

    public function common()
    {
        return round((($this->rating_functions + $this->rating_support + $this->rating_convenience) / 3), 1);
    }

    public function beforeValidate()
    {
        $this->created_at = time();
        return parent::beforeValidate();
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($program = Programs::findOne($this->program_id)) $program->updateRatings();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id', 'user_id', 'rating_convenience', 'rating_functions', 'rating_support', 'rating_common', 'created_at', 'status'], 'integer'],
            [['created_at'], 'required'],
            [['pluses', 'minuses', 'using_time', 'common', 'last_name', 'last_name', 'industry', 'position', 'using_time'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'pluses' => 'Pluses',
            'position' => 'Должность',
            'minuses' => 'Minuses',
            'common' => 'Common',
            'user_id' => 'User ID',
            'using_time' => 'Using Time',
            'rating_convenience' => 'Rating Convenience',
            'rating_common' => 'Rating Common',
            'rating_functions' => 'Rating Functions',
            'rating_support' => 'Rating Support',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }

    public function formName()
    {
        return '';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function renderStars()
    {
        $rating = $this->getRating();

        return Reviews::renderStar(1, $rating)
            . Reviews::renderStar(2, $rating)
            . Reviews::renderStar(3, $rating)
            . Reviews::renderStar(4, $rating)
            . Reviews::renderStar(5, $rating);


    }
}
