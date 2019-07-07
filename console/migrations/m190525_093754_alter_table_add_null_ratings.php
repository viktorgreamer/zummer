<?php

use yii\db\Migration;

/**
 * Class m190525_093754_alter_table_add_null_ratings
 */
class m190525_093754_alter_table_add_null_ratings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('{{%programs}}', 'rating',
            $this->float(1)->null()->defaultValue(0));

        $this->alterColumn('{{%programs}}', 'rating_convenience',
            $this->float(1)->null()->defaultValue(0));

        $this->alterColumn('{{%programs}}', 'rating_functions',
            $this->float(1)->null()->defaultValue(0));

        $this->alterColumn('{{%programs}}', 'rating_support',
            $this->float(1)->null()->defaultValue(0));


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190525_093754_alter_table_add_null_ratings cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190525_093754_alter_table_add_null_ratings cannot be reverted.\n";

        return false;
    }
    */
}
