<?php

use yii\db\Migration;

/**
 * Class m190525_145804_create_table_platforms_asignment
 */
class m190525_145804_create_table_platforms_asignment extends Migration
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

        $this->createTable('{{%platforms_assignment}}', [
            'program_id' => $this->integer(5)->notNull(),
            'platform_id' => $this->integer(2)->notNull()
        ], $tableOptions);

        $this->createIndex('idx-program_id-platform_id', '{{%platforms_assignment}}',
            ['program_id', 'platform_id'], true
        );

        // add foreign key for table `{{%programs}}`
        $this->addForeignKey(
            'fk-id-program_id-platforms',
            '{{%platforms_assignment}}',
            'program_id',
            '{{%programs}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%platforms}}`
        $this->addForeignKey(
            'fk-id-platform_id',
            '{{%platforms_assignment}}',
            'platform_id',
            '{{%platforms}}',
            'id',
            'CASCADE'
        );



        

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190525_145804_create_table_platforms_asignment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190525_145804_create_table_platforms_asignment cannot be reverted.\n";

        return false;
    }
    */
}
