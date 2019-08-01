<?php

use yii\db\Migration;

/**
 * Class m190731_164707_add_main_page_promo
 */
class m190731_164707_add_main_page_promo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%programs}}',
            'main_page_order',
            $this->integer(2)->null()->comment('Приоритет на главной странице'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}','main_page_order');
    }


}
