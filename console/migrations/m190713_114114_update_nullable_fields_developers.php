<?php

use yii\db\Migration;

/**
 * Class m190713_114114_update_nullable_fields_developers
 */
class m190713_114114_update_nullable_fields_developers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('{{%developers}}', 'name',
            $this->string(256)->null()->defaultValue(''));

        $this->alterColumn('{{%developers}}', 'site',
            $this->string(256)->null()->defaultValue(''));

        $this->alterColumn('{{%developers}}', 'foundation_year',
            $this->integer(4)->null()->defaultValue(null));

        $this->alterColumn('{{%developers}}', 'country',
            $this->string(256)->null()->defaultValue(''));
        
        $this->alterColumn('{{%developers}}', 'description',
            $this->string(256)->null()->defaultValue(''));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->alterColumn('{{%developers}}', 'name',
            $this->string(256)->notNull()->defaultValue(''));

        $this->alterColumn('{{%developers}}', 'site',
            $this->string(256)->notNull()->defaultValue(''));

        $this->alterColumn('{{%developers}}', 'foundation_year',
            $this->integer(4)->notNull()->defaultValue(null));

        $this->alterColumn('{{%developers}}', 'country',
            $this->string(256)->notNull()->defaultValue(''));

        $this->alterColumn('{{%developers}}', 'description',
            $this->string(256)->notNull()->defaultValue(''));
     
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190713_114114_update_nullable_fields_developers cannot be reverted.\n";

        return false;
    }
    */
}
