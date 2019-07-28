<?php

use yii\db\Migration;

/**
 * Class m190727_102622_add_primary_keys_prograsm_images_awards
 */
class m190727_102622_add_primary_keys_prograsm_images_awards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn( '{{%programs_awards_images}}','id',$this->primaryKey());



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn( '{{%programs_awards_images}}','id',$this->primaryKey());

    }
}
