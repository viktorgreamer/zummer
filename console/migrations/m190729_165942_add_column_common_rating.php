<?php

use yii\db\Migration;

/**
 * Class m190729_165942_add_column_common_rating
 */
class m190729_165942_add_column_common_rating extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%reviews}}', 'rating_common',$this->integer(1)->null()->comment('Общие рейтинг'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%reviews}}', 'rating_common');
    }
}
