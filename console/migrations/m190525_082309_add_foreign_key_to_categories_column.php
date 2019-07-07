<?php

use yii\db\Migration;

/**
 * Class m190525_082309_add_foreign_key_to_categories_column
 */
class m190525_082309_add_foreign_key_to_categories_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        // add foreign key for table `{{%programs}}`
        $this->addForeignKey(
            'fk-id-category_id',
            '{{%programs}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190525_082309_add_foreign_key_to_categories_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190525_082309_add_foreign_key_to_categories_column cannot be reverted.\n";

        return false;
    }
    */
}
