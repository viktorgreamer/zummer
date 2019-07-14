<?php

use yii\db\Migration;

/**
 * Class m190529_172158_create_table_content_category
 */
class m190529_172158_create_table_content_category extends Migration
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

        $this->createTable('{{%content_categories}}', [
            'id' => $this->primaryKey(5),
            'name' => $this->string(256)->notNull(),
        ], $tableOptions);

        // creates index for column `id`
        $this->createIndex(
            'idx-content_category_id',
            '{{%content_categories}}',
            'id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%content_categories}}');
    }


}
