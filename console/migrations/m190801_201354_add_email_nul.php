<?php

use yii\db\Migration;

/**
 * Class m190801_201354_add_email_nul
 */
class m190801_201354_add_email_nul extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%user}}','email', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%user}}','email', $this->string()->notNull()->unique());

    }

}
