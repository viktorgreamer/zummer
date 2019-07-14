<?php

use yii\db\Migration;

/**
 * Class m190713_115911_add_user_fields
 */
class m190713_115911_add_user_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%user}}',
            'first_name', $this->string(256)->null()
        );

        $this->addColumn('{{%user}}',
            'last_name', $this->string(256)->null()
        );


        $this->addColumn('{{%developers}}',
            'address1', $this->string(256)->null()
        );

        $this->addColumn('{{%developers}}',
            'address2', $this->string(256)->null()
        );

        $this->addColumn('{{%developers}}',
            'phone', $this->string(256)->null()
        );

        $this->addColumn('{{%developers}}',
            'postcode', $this->string(256)->null()
        );

        $this->addColumn('{{%developers}}',
            'office_country', $this->string(256)->null()
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}',
            'first_name'
        );

        $this->dropColumn('{{%user}}',
            'last_name'
        );


        $this->dropColumn('{{%developers}}',
            'address1'
        );

        $this->dropColumn('{{%developers}}',
            'address2'
        );

        $this->dropColumn('{{%developers}}',
            'phone'
        );

        $this->dropColumn('{{%developers}}',
            'postcode'
        );

        $this->dropColumn('{{%developers}}',
            'office_country'
        );

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190713_115911_add_user_fields cannot be reverted.\n";

        return false;
    }
    */
}
