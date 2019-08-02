<?php

use yii\db\Migration;

/**
 * Class m190801_174204_add_main_page_position
 */
class m190801_174204_add_main_page_position extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn("{{%programs}}",'main_page_position',$this->integer(2)->null()->comment('Позиция на главной страниц'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("{{%programs}}",'main_page_position');

    }

}
