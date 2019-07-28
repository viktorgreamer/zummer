<?php

use yii\db\Migration;

/**
 * Class m190727_052041_add_column_programs
 */
class m190727_052043_add_column_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%programs}}','price_per_users',$this->integer(1)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}','price_per_users');
     }
}
