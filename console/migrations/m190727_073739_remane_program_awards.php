<?php

use yii\db\Migration;

/**
 * Class m190727_073739_remane_program_awards
 */
class m190727_073739_remane_program_awards extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        // add foreign key for table `{{%functions}}`
        $this->dropForeignKey(
            'fk-developer_id',
            '{{%developers_awards_images}}'
        );


        $this->renameTable('{{%developers_awards_images}}', '{{%programs_awards_images}}');
        $this->renameColumn('{{%programs_awards_images}}', 'developer_id', 'program_id');


        // add foreign key for table `{{%functions}}`
        $this->addForeignKey(
            'fk-programs_awards_images-program_id',
            '{{%programs_awards_images}}',
            'program_id',
            '{{%programs}}',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190727_073739_remane_program_awards cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190727_073739_remane_program_awards cannot be reverted.\n";

        return false;
    }
    */
}
