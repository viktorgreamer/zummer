<?php

use yii\db\Migration;

/**
 * Class m190522_132253_reviews
 */
class m190522_132253_reviews extends Migration
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


        $this->createTable('{{%reviews}}', [
            'id' => $this->primaryKey(11),
            'program_id' => $this->integer(7)->notNull(),
            'title' => $this->string(255)->notNull(),
            'pluses' =>  $this->text(),
            'minuses' =>  $this->text(),
            'common' => $this->text(),
            'user_id' => $this->integer(11),
            'using_time' => $this->integer(2),
            'rating_convenience' => $this->integer(1)->defaultValue(0),
            'rating_functions' => $this->integer(1)->defaultValue(0),
            'rating_support' => $this->integer(1)->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger(1)->null()->defaultValue(0)
        ], $tableOptions);


        // creates index for column `id`
        $this->createIndex(
            'idx-review_id',
            '{{%reviews}}',
            'id'
        );


        // add foreign key for table `{{%programs}}`
        $this->addForeignKey(
            'fk-id-program_id-reviews',
            '{{%reviews}}',
            'program_id',
            '{{%programs}}',
            'id',
            'CASCADE'
        );



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190522_132253_reviews cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190522_132253_reviews cannot be reverted.\n";

        return false;
    }
    */
}
