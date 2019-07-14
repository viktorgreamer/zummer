<?php

use yii\db\Migration;

/**
 * Class m190713_202141_add_column_type_id_to_functions
 */
class m190713_202141_add_column_type_id_to_functions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%functions}}',
            'type_id',$this->integer(3));


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%functions}}',
            'type_id' );

    }
}
