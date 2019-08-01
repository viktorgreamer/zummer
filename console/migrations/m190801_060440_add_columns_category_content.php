<?php

use yii\db\Migration;

/**
 * Class m190801_060440_add_columns_category_content
 */
class m190801_060440_add_columns_category_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%content_articles}}', 'is_advise', $this->integer()->null()->defaultValue(null)->comment('Совет для категорий'));
        $this->addColumn('{{%content_articles}}', 'category_program_id', $this->integer()->null()->comment('Категория программы'));
        $this->addColumn('{{%content_articles}}', 'do_not_show', $this->integer()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%content_articles}}', 'is_advise');
        $this->dropColumn('{{%content_articles}}', 'category_program_id');
        $this->dropColumn('{{%content_articles}}', 'do_not_show');

    }

}
