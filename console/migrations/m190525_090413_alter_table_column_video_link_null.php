<?php

use yii\db\Migration;

/**
 * Class m190525_090413_alter_table_column_video_link_null
 */
class m190525_090413_alter_table_column_video_link_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('{{%programs}}', 'video_link',
            $this->text()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190525_090413_alter_table_column_video_link_null cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190525_090413_alter_table_column_video_link_null cannot be reverted.\n";

        return false;
    }
    */
}
