<?php

use yii\db\Migration;

/**
 * Class m190529_172207_create_table_content_news
 */
class m190529_172207_create_table_content_news extends Migration
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

        $this->createTable('{{%content_news}}', [
            'id' => $this->primaryKey(11),
            'category_id' => $this->integer(5)->notNull(),
            'name' => $this->string(256)->notNull(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'status' => $this->integer(1)->notNull()->defaultValue(0),
            'user_id' => $this->integer(11)->notNull(),
        ], $tableOptions);

        // creates index for column `id`
        $this->createIndex(
            'idx-news_id',
            '{{%content_news}}',
            'id'
        );

        // add foreign key for table `{{%content_categories}}`
        $this->addForeignKey(
            'fk-id-category_id_news',
            '{{%content_news}}',
            'category_id',
            '{{%content_categories}}',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190529_172207_create_table_content_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190529_172207_create_table_content_news cannot be reverted.\n";

        return false;
    }
    */
}
