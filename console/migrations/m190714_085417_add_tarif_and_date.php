<?php

use yii\db\Migration;

/**
 * Class m190714_085417_add_tarif_and_date
 */
class m190714_085417_add_tarif_and_date extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%programs}}',
            'tariff', $this->integer(3)->null()->comment('Тариф'));
        $this->addColumn('{{%programs}}',
            'dueDate', $this->date()->null()->comment('Дата истечения тарифа'));


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}',
            'tariff');
        $this->dropColumn('{{%programs}}',
            'dueDate');
    }

}
