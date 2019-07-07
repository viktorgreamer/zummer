<?php

use yii\db\Migration;

/**
 * Class m190522_132223_developers
 */
class m190522_132223_developers extends Migration
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

        $this->createTable('{{%developers}}', [
            'id' => $this->primaryKey(6),
            'name' => $this->string(256)->notNull(),
            'site' => $this->string(256)->notNull(),
            'description' => $this->text()->notNull(),
            'country' => $this->string(150)->notNull(),
            'foundation_year' => $this->integer()->notNull(),
            'user_id' => $this->integer(11)->notNull()
        ], $tableOptions);

        $this->addColumn('{{%developers}}', 'verification_token', $this->string()->defaultValue(null));

        // creates index for column `id`
        $this->createIndex(
            'idx-developer_id',
            '{{%developers}}',
            'id'
        );

        // add foreign key for table `{{%programs}}`
        $this->addForeignKey(
            'fk-id-program_id',
            '{{%programs}}',
            'developer_id',
            '{{%developers}}',
            'id',
            'CASCADE'
        );





    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190522_132223_developers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190522_132223_developers cannot be reverted.\n";

        return false;
    }
    */
}
