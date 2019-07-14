<?php

use yii\db\Migration;

/**
 * Class m190714_081139_add_tags_to_program
 */
class m190714_081139_add_tags_to_program extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%program_tags}}',
            [
                'id' => $this->primaryKey(),
                'program_id' => $this->integer(),
                'name' => $this->string(70),
                'link' => $this->text()->null(),
                'order' => $this->integer(3)
            ]);
        $this->createIndex('idx-program_id', '{{%program_tags}}', 'program_id');

        $this->addForeignKey(
            'fk-program_id_tags_id',
            '{{%program_tags}}',
            'program_id',
            '{{%programs}}',
            'id',
            'CASCADE',
            'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-program_id_tags_id', '{{%program_tags}}');
        $this->dropIndex('idx-program_id', '{{%program_tags}}');
        $this->dropTable('{{%program_tags}}');
    }

}
