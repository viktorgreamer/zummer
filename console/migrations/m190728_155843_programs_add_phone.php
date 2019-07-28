<?php

use yii\db\Migration;

/**
 * Class m190728_155843_programs_add_phone
 */
class m190728_155843_programs_add_phone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%programs}}','phone',$this->string(256)->null()->comment('Телефон'));
        $this->addColumn('{{%user}}','is_developer',$this->integer(1)->null()->comment('Разработчик'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}','phone');
        $this->dropColumn('{{%user}}','is_developer');

    }

}
