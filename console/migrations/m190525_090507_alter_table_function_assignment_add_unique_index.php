<?php

use yii\db\Migration;

/**
 * Class m190525_090507_alter_table_function_assignment_add_unique_index
 */
class m190525_090507_alter_table_function_assignment_add_unique_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createIndex('idx-program_id-function_id', '{{%functions_assignment}}',
            ['program_id', 'function_id'], true
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190525_090507_alter_table_function_assignment_add_unique_index cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190525_090507_alter_table_function_assignment_add_unique_index cannot be reverted.\n";

        return false;
    }
    */
}
