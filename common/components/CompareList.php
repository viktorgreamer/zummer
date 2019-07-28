<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 21.12.2018
 * Time: 22:02
 */

namespace common\components;
use common\models\Programs;
use common\models\traits\CookieRepositorable;
use yii\base\Component;

class CompareList extends Component
{
    use CookieRepositorable;

    public function getInstanceClass()
    {
        return Programs::className();

    }

    public function getId()
    {
        return 'id';
    }

    /**
     * @param int $id
     * @return string
     */
    public function renderClass($id) {
      return $this->isIn($id) ? ' offer-block__info--like-active' : '';
    }
}