<?php

use yii\db\Migration;

/**
 * Class m190711_051152_add_columns_logo_in_programs_table
 */
class m190711_051152_add_columns_logo_in_programs_table extends Migration
{
    public function safeUp()
    {


        $this->addColumn('{{%programs}}', 'logo', $this->string(256)->notNull());


    }

    public function safeDown()
    {
        $this->dropColumn('{{%programs}}', 'logo');
    }
}
