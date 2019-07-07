<?php

use yii\db\Migration;

/**
 * Class m190529_172057_create_table_subscriptions
 */
class m190529_172057_create_table_subscriptions extends Migration
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

        $this->createTable('{{%subscriptions}}', [
            'id' => $this->primaryKey(11),
            'email' => $this->string(256)->notNull(),
            'is_news' => $this->smallInteger()->null(),
            'is_articles' => $this->smallInteger()->null(),
            'user_id' => $this->integer(11)->null(),
            'status' => $this->smallInteger()->null(),
            'created_at' => $this->integer(11)->null(),
        ], $tableOptions);

        // creates index for column `id`
        $this->createIndex(
            'idx-subscription_id',
            '{{%subscriptions}}',
            'id'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190529_172057_create_table_subscriptions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190529_172057_create_table_subscriptions cannot be reverted.\n";

        return false;
    }
    */
}
