<?php

namespace frontend\models;

use common\models\Reviews;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CreateReviewForm extends Model
{
    public $email;
    public $program_id;
    public $first_name;
    public $last_name;
    public $common;
    public $pluses;
    public $minuses;
    public $using_time;
    public $phone;
    public $position;
    public $rating_convenience;
    public $rating_functions;
    public $rating_support;
    public $rating_common;
    public $industry;
    public $isOk = false;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email','program_id'], 'required'],
            [['email'], 'email'],
            [['rating_convenience','rating_functions','rating_support','rating_common','program_id'], 'integer'],
            [['first_name','last_name','phone','industry','position','using_time'], 'string','max' => 256],
            [['common','pluses','minuses','industry'], 'string'],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $review = new Reviews(['program_id' => $this->program_id]);
            $review->last_name = $this->last_name;
            $review->first_name = $this->first_name;
            $review->program_id = $this->program_id;
            $review->rating_support = $this->rating_support;
            $review->rating_convenience = $this->rating_convenience;
            $review->rating_common = $this->rating_common;
            $review->rating_functions = $this->rating_functions;
            $review->user_id = Yii::$app->user->id?: 0;
            $review->common = $this->common;
            $review->minuses = $this->minuses;
            $review->pluses = $this->pluses;
            $review->industry = $this->industry;
            $review->position = $this->position;

            if ($review->save()) {
                $this->isOk = true;
                return true;
            } else {
                Yii::error($review->errors);
            }
        } else {
            Yii::error($this->errors);
        }
    }

}
