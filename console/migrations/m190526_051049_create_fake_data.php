<?php

use common\models\Programs;
use yii\db\Migration;

/**
 * Class m190526_051049_create_fake_data
 */
class m190526_051049_create_fake_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $platfromsId = array_flip(\common\models\Platforms::find()->select('id')->column());
        $functionsId = array_flip(\common\models\Functions::find()->select('id')->column());
        $faker = Faker\Factory::create('ru');


        $errors = [];
        //creating fake category and programs
        foreach (range(1, 10) as $item) {
            $category = new \common\models\Categories(['name' => $faker->name]);
            $category->description = $faker->text;
            if (!$category->save()) $errors[] = $category->errors;

            foreach (range(1, 10) as $item2) {

                $developer = new \common\models\Developers();
                $developer->name = $faker->name;
                $developer->description = $faker->text(300);
                $developer->foundation_year = 2000 + $item;
                $developer->site = $faker->url;
                $developer->user_id = $item + 1;
                $developer->country = $faker->country;
                if (!$developer->save()) $errors[] = $developer->errors;;


                $program = new Programs();
                $program->link = $faker->url;
                $program->trial_link = $faker->url;
                $program->name = $faker->text(15);
                $program->destination = $faker->text(400);
                $program->description = $faker->text(400);
                $program->support_map = array_rand(Programs::mapSupport());
                $program->learning_map = array_rand(Programs::mapLearning());

                $program->platforms = \common\models\Platforms::findAll(array_rand($platfromsId));
                $program->functions = \common\models\Functions::findAll(array_rand($functionsId));
                $program->status = 1;
                $program->developer_id = $developer->id;
                $program->category_id = $category->id;

                if (!$program->save()) $errors[] = $program->errors;


            }
        }

        if ($errors) {

            print_r($errors);
            return false;
        }


    }

    /**
     * {@inheritdoc}
     */
    public
    function safeDown()
    {
        echo "m190526_051049_create_fake_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190526_051049_create_fake_data cannot be reverted.\n";

        return false;
    }
    */
}
