<?php

use yii\db\Migration;

/**
 * Class m190525_082241_alter_add_category_column
 */
class m190525_082241_alter_add_category_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->addColumn('{{%programs}}', 'category_id', $this->integer(5)->notNull());

        // creates index for column `id`
        $this->createIndex(
            'idx-category_id',
            '{{%programs}}',
            'category_id'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190525_082241_alter_add_category_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190525_082241_alter_add_category_column cannot be reverted.\n";

        return false;
    }
    */
}
