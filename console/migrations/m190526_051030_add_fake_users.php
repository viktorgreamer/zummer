<?php

use yii\db\Migration;

/**
 * Class m190526_065212_add_fake_users
 */
class m190526_051030_add_fake_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $faker = Faker\Factory::create('ru');

        // creating fake users
        foreach (range(1, 10) as $item) {
            $user = new \common\models\User();
            $user->username = $faker->userName;
            $user->email = $faker->email;
            $user->setPassword(123456);
            $user->save();
            $user->status = 10;
            $user->save();
        }


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190526_065212_add_fake_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190526_065212_add_fake_users cannot be reverted.\n";

        return false;
    }
    */
}
