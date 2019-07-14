<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%industry}}`.
 */
class m190713_195610_create_industry_table extends Migration
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

        $this->createTable('{{%category_industries}}', [
            'id' => $this->primaryKey(5),
            'name' => $this->string(256)->notNull(),
        ], $tableOptions);

        // creates index for column `id`
        $this->createIndex(
            'idx-category_id-industry_id',
            '{{%category_industries}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_industries}}');
    }
}
