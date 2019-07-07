<?php

use yii\db\Migration;

/**
 * Class m190522_140117_functions_assignment
 */
class m190522_140117_functions_assignment extends Migration
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

        $this->createTable('{{%functions_assignment}}', [
            'program_id' => $this->integer(5)->notNull(),
            'function_id' => $this->integer(3)->notNull()
        ], $tableOptions);

        // creates index for column `function_id`
        $this->createIndex(
            'idx-assignment_function_id',
            '{{%functions_assignment}}',
            'function_id'
        );

        // creates index for column `program_id`
        $this->createIndex(
            'idx-function_program_id',
            '{{%functions_assignment}}',
            'program_id'
        );

        // add foreign key for table `{{%programs}}`
        $this->addForeignKey(
            'fk-id-program_id-functions',
            '{{%functions_assignment}}',
            'program_id',
            '{{%programs}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%functions}}`
        $this->addForeignKey(
            'fk-id-function_id',
            '{{%functions_assignment}}',
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
        echo "m190522_140117_functions_assignment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190522_140117_functions_assignment cannot be reverted.\n";

        return false;
    }
    */
}
