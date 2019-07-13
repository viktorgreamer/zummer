<?php

use yii\db\Migration;

/**
 * Class m190711_051606_add_columns_image_in_content_article
 */
class m190711_051606_add_columns_image_in_content_article extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%content_articles}}', 'image', $this->string(256));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%content_articles}}', 'image');
    }

}
