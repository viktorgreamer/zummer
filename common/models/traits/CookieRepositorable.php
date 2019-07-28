<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 05.03.2019
 * Time: 10:44
 */

namespace common\models\traits;


trait CookieRepositorable
{
    public function emptyList()
    {
        return serialize([]);
    }

    /**
     * @return string
     */

    public function getId()
    {
        return 'id';
    }

    public function getName()
    {
        return get_class($this);
    }

    /**
     * @return string class name extends from ActiveRecord
     */
    public function getInstanceClass()
    {
        return '';
    }


    public function add($id)
    {
        $cookies = \Yii::$app->response->cookies;

        $cookies->add(new \yii\web\Cookie([
            'name' => $this->getName(),
            'value' => serialize(array_unique(array_merge($this->getItemsFromCookie(), [$id]))),
        ]));

    }

    /**
     * @param integer $id
     * @return bool
     */
    public function isIn($id) {
        \Yii::warning($this->get());
        return in_array($id,$this->get());
    }


    public function remove($id)
    {
        $cookies = \Yii::$app->response->cookies;

        $cookies->add(new \yii\web\Cookie([
            'name' => $this->getName(),
            'value' => serialize(array_unique(array_diff($this->getItemsFromCookie() ?: [], [$id]))),
        ]));

    }

    public function clear()
    {
        $cookies = \Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => $this->getName(),
            'value' => serialize([]),
        ]));

    }

    public function getItemsFromCookie()
    {
        $cookies = \Yii::$app->request->cookies;
        return unserialize($cookies->getValue($this->getName(), $this->emptyList()));

    }

    public function get()
    {
        return $this->getItemsFromCookie();
    }

    public function getCount()
    {
        $class = $this->getInstanceClass();
        return $class::find()->where(['in', $this->getId(), $this->get()])->count();
    }


}