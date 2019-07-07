<?php

use yii\db\Migration;

/**
 * Class m190525_145519_create_table_platforms
 */
class m190525_145519_create_table_platforms extends Migration
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

        $this->createTable('{{%platforms}}', [
            'id' => $this->primaryKey(2),
            'name' => $this->string(256)->notNull(),
        ], $tableOptions);

        // creates index for column `id`
        $this->createIndex(
            'idx-platform_id',
            '{{%platforms}}',
            'id'
        );




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190525_145519_create_table_platforms cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190525_145519_create_table_platforms cannot be reverted.\n";

        return false;
    }
    */
}
