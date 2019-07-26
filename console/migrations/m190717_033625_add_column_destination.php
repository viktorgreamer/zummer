<?php

use yii\db\Migration;

/**
 * Class m190717_033625_add_column_destimation
 */
class m190717_033625_add_column_destination extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%programs}}','destination_id',$this->integer(3)->null()->comment('Тип назначения'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}','destination_id');

    }

}
