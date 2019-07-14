<?php

use yii\db\Migration;

/**
 * Class m190713_200417_add_column_catogories
 */
class m190713_200417_add_column_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%categories}}',
            'industry_id', $this->integer(5)
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%categories}}',
            'industry_id'
        );

    }

}
