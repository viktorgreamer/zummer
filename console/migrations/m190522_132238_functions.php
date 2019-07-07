<?php

use yii\db\Migration;

/**
 * Class m190522_132238_functions
 */
class m190522_132238_functions extends Migration
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

        $this->createTable('{{%functions}}', [
            'id' => $this->primaryKey(3),
            'name' => $this->string(256)->notNull(),
            'priority' => $this->integer(3)->notNull(),
            'description' => $this->text()->notNull(),
        ], $tableOptions);

        // creates index for column `id`
        $this->createIndex(
            'idx-function_id',
            '{{%functions}}',
            'id'
        );







    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190522_132238_functions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190522_132238_functions cannot be reverted.\n";

        return false;
    }
    */
}
