<?php

use yii\db\Migration;

/**
 * Class m190728_165426_set
 */
class m190728_165426_set extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%user}}',
            'username');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%user}}',
            'username', $this->string()->notNull()->unique());

    }

}
