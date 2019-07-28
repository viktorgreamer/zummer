<?php

use yii\db\Migration;

/**
 * Class m190728_080400_create_table_content_images
 */
class m190728_080400_create_table_content_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{content_images}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256),
            'src' => $this->string(256)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{content_images}}');
    }

}
