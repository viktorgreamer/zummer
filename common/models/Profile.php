<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 13.07.2019
 * Time: 13:23
 */

namespace common\models;


class Profile
{
    private $developer;
    public $notCompleted = [];
    public $percent = 0;

    public function __construct(Developers $developer)
    {
        $this->developer = $developer;
        $this->getCompleteness();
    }

    private function getCompleteness()
    {
       foreach ($this->developer->attributesToFill as $key => $attribute) {
           if (!$this->developer->$key) $this->notCompleted[$key] = $attribute;
       }
       $this->percent =  round(100 *(count($this->notCompleted))/(count($this->developer->attributesToFill)));
    }

}