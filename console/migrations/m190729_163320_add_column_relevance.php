<?php

use yii\db\Migration;

/**
 * Class m190729_163320_add_column_relevance
 */
class m190729_163320_add_column_relevance extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%programs}}','relevance',$this->integer()->defaultValue(0)->comment('Релевантность'));
    }

    /**
     * {@inheritdoc}
     */

    public function safeDown()
    {
        $this->dropColumn('{{%programs}}','relevance');

    }

}
