<?php

use yii\db\Migration;

/**
 * Class m190802_152950_add_payment_request
 */
class m190802_152950_add_payment_request extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%payment_requests}}",
            [
                'id' => $this->primaryKey(),
                'developer_id' => $this->integer()->notNull()->comment('Разработчик'),
                'amount' => $this->integer()->notNull()->comment('Сумма'),
                'created_at' => $this->integer(11)->comment('Дата создания'),
                'paid_at' => $this->integer(11)->comment('Дата оплаты'),
                'status' => $this->integer(1)->null()->comment('Запроса на оплату')
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable("{{%payment_requests}}");
    }


}
