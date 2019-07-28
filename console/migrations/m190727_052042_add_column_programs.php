<?php

use yii\db\Migration;

/**
 * Class m190727_052041_add_column_programs
 */
class m190727_052042_add_column_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%programs}}','description_short',$this->text()->null()->comment('Короткое описание'));
        $this->addColumn('{{%programs}}','hide_price',$this->integer(1)->null()->comment('Скрывать цену'));
        $this->addColumn('{{%programs}}','users_count',$this->string(256)->null()->comment('Кол-во пользователей'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}','description_short');
        $this->dropColumn('{{%programs}}','hide_price');
        $this->dropColumn('{{%programs}}','users_count');
    }
}
