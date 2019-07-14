<?php

use yii\db\Migration;

/**
 * Class m190714_174012_add_column_prices_link
 */
class m190714_174012_add_column_prices_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%programs}}',
            'prices_link', $this->string(256)->null()->comment('Ссылка на тарифы'));



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}',
            'prices_link');
    }
}
