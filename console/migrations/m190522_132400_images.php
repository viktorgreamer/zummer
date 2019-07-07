<?php

use yii\db\Migration;

/**
 * Class m190522_132400_images
 */
class m190522_132400_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%programs_images}}', [
            'id' => $this->primaryKey(11),
            'program_id' => $this->integer(6),
            'src' => $this->string(256)->notNull(),
            'priority' => $this->float(1),
           ], $tableOptions);




        // add foreign key for table `{{%programs}}`
        $this->addForeignKey(
            'fk-id-program_id-images',
            '{{%programs_images}}',
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
        echo "m190522_132400_images cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190522_132400_images cannot be reverted.\n";

        return false;
    }
    */
}
