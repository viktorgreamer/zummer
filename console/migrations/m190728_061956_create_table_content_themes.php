<?php

use yii\db\Migration;

/**
 * Class m190728_061956_create_table_content_themes
 */
class m190728_061956_create_table_content_themes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content_themes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->comment('Название'),
            'order' => $this->integer()->null()->comment('Порядок')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%content_themes}}');
    }

}
