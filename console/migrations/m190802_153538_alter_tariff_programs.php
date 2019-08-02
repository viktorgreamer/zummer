<?php

use yii\db\Migration;

/**
 * Class m190802_153538_alter_tariff_programs
 */
class m190802_153538_alter_tariff_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->renameColumn('{{%programs}}', 'tariff', 'tariff_id');
        $this->addColumn('{{%programs}}', 'tariff_type', $this->integer(1)->null()->comment('Тип тарифа'));
        $this->addColumn('{{%programs}}', 'auto_prolongation', $this->integer(1)->null()->comment('Тип тарифа'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('{{%programs}}', 'tariff_id', 'tariff');
        $this->dropColumn('{{%programs}}', 'tariff_type');
        $this->dropColumn('{{%programs}}', 'auto_prolongation');

    }
}
