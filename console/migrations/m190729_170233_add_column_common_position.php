<?php

use yii\db\Migration;

/**
 * Class m190729_170233_add_column_common_rating
 */
class m190729_170233_add_column_common_position extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%reviews}}', 'position',$this->string(256)->null()->comment(' Должность'));
        $this->addColumn('{{%reviews}}', 'first_name',$this->string(256)->null()->comment(' Имя'));
        $this->addColumn('{{%reviews}}', 'last_name',$this->string(256)->null()->comment(' Фамилия'));
        $this->addColumn('{{%reviews}}', 'industry',$this->string(256)->null()->comment(' Отрасль'));
        $this->alterColumn('{{%reviews}}', 'using_time',$this->string(256)->null()->comment(' Время использования'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%reviews}}', 'position');
        $this->dropColumn('{{%reviews}}', 'first_name');
        $this->dropColumn('{{%reviews}}', 'last_name');
        $this->dropColumn('{{%reviews}}', 'industry');
        $this->alterColumn('{{%reviews}}', 'using_time',$this->integer()->null()->comment(' Время использования'));


    }

}
