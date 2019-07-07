<?php

use yii\db\Migration;

/**
 * Class m190522_085605_programs
 */
class m190522_085605_programs extends Migration
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

        $this->createTable('{{%programs}}', [
            'id' => $this->primaryKey(7),
            'name' => $this->string(256)->notNull(),
            'link' => $this->string(256)->notNull(),
            'video_link' => $this->string(256)->notNull(),
            'destination' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'rating' => $this->float(1)->notNull()->defaultValue(0),
            'rating_convenience' => $this->float(1)->notNull()->defaultValue(0),
            'rating_functions' => $this->float(1)->notNull()->defaultValue(0),
            'rating_support' => $this->float(1)->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'developer_id' => $this->integer()->notNull(),
            'support' => $this->text()->notNull(),
            'learning' => $this->text()->notNull(),
            'price_from' => $this->float(1),
            'price_to' => $this->float(1),
            'prices' => $this->text()->null(),
            'has_month_plan' => $this->smallInteger()->null(),
            'has_year_plan' => $this->smallInteger()->null(),
            'has_free' => $this->smallInteger()->null(),
            'has_trial' => $this->smallInteger()->null(),
            'trial_link' => $this->text()->null(),

        ], $tableOptions);


        // creates index for column `id`
        $this->createIndex(
            'idx-program_id',
            '{{%programs}}',
            'id'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%programs}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190522_085605_programs cannot be reverted.\n";

        return false;
    }
    */
}
