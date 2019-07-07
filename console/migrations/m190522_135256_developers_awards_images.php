<?php

use yii\db\Migration;

/**
 * Class m190522_135256_developers_awards_images
 */
class m190522_135256_developers_awards_images extends Migration
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

        $this->createTable('{{%developers_awards_images}}', [
            'developer_id' => $this->integer(6)->notNull(),
            'priority' => $this->integer(2)->notNull(),
            'src' => $this->string(256)->notNull(),
            'description' => $this->text()->notNull(),

        ], $tableOptions);

        // add foreign key for table `{{%functions}}`
        $this->addForeignKey(
            'fk-developer_id',
            '{{%developers_awards_images}}',
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
        echo "m190522_135256_developers_awards_images cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190522_135256_developers_awards_images cannot be reverted.\n";

        return false;
    }
    */
}
