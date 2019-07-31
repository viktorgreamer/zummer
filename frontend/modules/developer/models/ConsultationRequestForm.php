<?php

namespace frontend\modules\developer\models;

use common\models\Requests;
use yii\base\Model;

/**
 * Login form
 */
class ConsultationRequestForm extends Model
{
    public $email;
    public $first_name;
    public $last_name;
    public $phone;
    public $body;
    public $program_industry;
    public $site;
    public $isOk = false;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'phone'], 'required'],
            // rememberMe must be a boolean value
            [['last_name','last_name','phone','program_industry','site','body'], 'string','max' => 256],

        ];
    }

    public function save()
    {

        if ($this->validate()) {
            $request = new Requests(['type_id' => Requests::TYPE_CONSULTATION_REQUEST]);
            $request->from = $this->first_name ." ".$this->last_name;
            $request->body = '';
          if ($this->phone) $request->body .= "Телефон: ".$this->phone."<br>";
          if ($this->email) $request->body .= "Email: ".$this->email."<br>";
          if ($this->site) $request->body .= "Сайт: ".$this->site."<br>";
            if ($this->program_industry) $request->body .= "Отрасть программы: ".$this->program_industry."<br>";
            if ($this->body) $request->body .= "Сообщение: ".$this->body."<br>";
            if ($request->save()) {
               $this->isOk = true;
           }
        }
    }
}
