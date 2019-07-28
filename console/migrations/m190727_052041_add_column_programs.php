<?php

use yii\db\Migration;

/**
 * Class m190727_052041_add_column_programs
 */
class m190727_052041_add_column_programs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%programs}}','price_plan',$this->integer(1)->null()->comment('Тип цены'));
        $this->addColumn('{{%programs}}','support_free',$this->integer(1)->null()->comment('Бесплатная поддержка'));
        $this->addColumn('{{%programs}}','support_paid',$this->integer(1)->null()->comment('Оплата поддержки'));
        $this->addColumn('{{%programs}}','learning_paid',$this->integer(1)->null()->comment('Оплата обучения'));
        $this->addColumn('{{%programs}}','learning_free',$this->integer(1)->null()->comment('Бесплатное обучение'));
        $this->addColumn('{{%programs}}','demonstration',$this->string(256)->null()->comment('План демонстрации'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%programs}}','price_plan');
        $this->dropColumn('{{%programs}}','support_free');
        $this->dropColumn('{{%programs}}','support_paid');
        $this->dropColumn('{{%programs}}','learning_paid');
        $this->dropColumn('{{%programs}}','learning_free');
        $this->dropColumn('{{%programs}}','demonstration');

    }
}
