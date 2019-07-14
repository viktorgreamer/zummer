<?php

use yii\db\Migration;

/**
 * Class m190713_165214_add_profile_fields_logo
 */
class m190713_165214_add_profile_fields_logo extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%developers}}',
            'logo', $this->string(256)->null()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('{{%developers}}',
            'logo'
        );


    }

}
