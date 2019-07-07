<?php

use yii\db\Migration;

/**
 * Class m190528_144603_create_table_catgeory_functions_assignment
 */
class m190528_144603_create_table_catgeory_functions_assignment extends Migration
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

        $this->createTable('{{%category_functions_assignment}}', [
            'category_id' => $this->integer(5)->notNull(),
            'function_id' => $this->integer(3)->notNull()
        ], $tableOptions);

        $this->createIndex('idx-function_id-category_id', '{{%category_functions_assignment}}',
            ['category_id', 'function_id'], true
        );

        // add foreign key for table `{{%programs}}`
        $this->addForeignKey(
            'fk-id-category_id_functions',
            '{{%category_functions_assignment}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%platforms}}`
        $this->addForeignKey(
            'fk-id-function_id_functions',
            '{{%category_functions_assignment}}',
            'function_id',
            '{{%functions}}',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190528_144603_create_table_catgeory_functions_assignment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190528_144603_create_table_catgeory_functions_assignment cannot be reverted.\n";

        return false;
    }
    */
}
