<?php

use yii\db\Migration;

/**
 * Class m190713_122630_add_profile_fields
 */
class m190713_123030_add_profile_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->addColumn('{{%developers}}',
            'city', $this->string(256)->null()
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {


        $this->dropColumn('{{%developers}}',
            'city'
        );


    }
}
