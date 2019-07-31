<?php

use yii\db\Migration;

/**
 * Class m190731_025225_add_columns_billing
 */
class m190731_025225_add_columns_billing extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%developers}}','billing',$this->integer()->null()->comment('Биллинг'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%developers}}','billing');

    }

}
