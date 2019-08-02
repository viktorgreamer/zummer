<?php

use yii\db\Migration;

/**
 * Class m190802_042332_add_column_category_tariff
 */
class m190802_042332_add_column_category_tariff extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%tariffs}}','group_id',$this->integer(2)->null()->comment('Группа тарифов'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tariffs}}','group_id');
    }

}
