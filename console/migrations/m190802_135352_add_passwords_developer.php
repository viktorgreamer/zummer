<?php

use yii\db\Migration;

/**
 * Class m190802_135352_add_passwords_developer
 */
class m190802_135352_add_passwords_developer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn("{{%developers}}",'password',$this->string(50)->null()->comment('Стартовый пароль от кабинета'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("{{%developers}}",'password');

    }

}
