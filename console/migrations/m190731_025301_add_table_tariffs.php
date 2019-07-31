<?php

use yii\db\Migration;

/**
 * Class m190731_025301_add_table_tariffs
 */
class m190731_025301_add_table_tariffs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tariffs}}',[
           'id' => $this->primaryKey(),
           'name' => $this->string(256)->comment('Название'),
           'category_id' => $this->integer()->null()->comment('Категория') ,
            'rate' => $this->integer(7)->comment('Ставка')
        ],$tableOptions);

    }


    public function safeDown()
    {
        $this->dropTable('{{tariffs}');
    }


}
