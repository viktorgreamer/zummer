<?php

use yii\db\Migration;

/**
 * Class m190713_073424_add_views_count_to_programs
 */
class m190713_073424_add_views_count_to_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%programs}}','views',$this->integer()->null()->defaultValue(0)->comment('Кол-во просмотров'));
        $this->addColumn('{{%programs}}','popularity',$this->integer()->null()->defaultValue(0)->comment('Рейтинг попурярности'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}','views');
        $this->dropColumn('{{%programs}}','popularity');

    }

}
