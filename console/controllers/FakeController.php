<?php
/**
 * Created by PhpStorm.
 * User: anvik
 * Date: 26.05.2019
 * Time: 10:32
 */


namespace console\controllers;

use common\models\Categories;
use common\models\ContentArticles;
use common\models\ContentCategories;
use common\models\ContentNews;
use common\models\Developers;
use common\models\Programs;
use common\models\Reviews;
use Faker\Factory;

class FakeController extends \yii\console\Controller
{

    public $errors = [];

    public function actionAddUsers($count = 10)
    {

        $faker = Factory::create('ru');


        // creating fake users
        foreach (range(1, 10) as $item) {
            $user = new \common\models\User();
            $user->username = $faker->userName;
            $user->email = $faker->email;
            $user->setPassword(123456);
            $user->save();
            $user->status = 10;
            if (!$user->save()) $this->errors[] = $user->errors;
        }

    }

    public function actionRemoveAll()
    {
        Categories::deleteAll();
        Developers::deleteAll();

    }

    public function actionAddPrograms($count = 10)
    {

        $platfromsId = array_flip(\common\models\Platforms::find()->select('id')->column());
        $functionsId = array_flip(\common\models\Functions::find()->select('id')->column());
        $usersId = array_flip(\common\models\User::find()->select('id')->column());
        $faker = Factory::create('ru');
        //creating fake category and programs
        foreach (range(1, $count) as $item) {
            $category = new Categories(['name' => $faker->name]);
            $category->description = $faker->text;
            if (!$category->save()) $this->errors[] = $category->errors;

            foreach (range(1, $count) as $item2) {

                $developer = new Developers();
                $developer->name = $faker->name;
                $developer->description = $faker->text(300);
                $developer->foundation_year = 2000 + $item;
                $developer->site = $faker->url;
                $developer->user_id = $item + 1;
                $developer->country = $faker->country;
                if (!$developer->save()) $this->errors[] = $developer->errors;


                $program = new Programs();
                $program->link = $faker->url;
                $program->trial_link = $faker->url;
                $program->name = $faker->text(15);
                $program->destination = $faker->text(100);
                $program->description = $faker->text(200);
                $program->support_map = array_rand(Programs::mapSupport());
                $program->learning_map = array_rand(Programs::mapLearning());
                $program->price_from = round(rand(0, 1000), -2) - 1;
                $program->price_to = round(rand(1000, 10000), -2) - 1;
                $program->platforms = \common\models\Platforms::findAll(array_rand($platfromsId, 3));
                $program->functions = \common\models\Functions::findAll(array_rand($functionsId, 3));
                $program->status = 1;
                $program->developer_id = $developer->id;
                $program->category_id = $category->id;
                if (!$program->save()) $this->errors[] = $program->errors;

                $reviews = [];

                foreach (range(1, rand(1, 9)) as $review_iterations) {
                    $review = new Reviews();
                    $review->program_id = $program->id;
                    $review->title = $faker->text(50);
                    $review->pluses = $faker->text(100);
                    $review->minuses = $faker->text(100);
                    $review->common = $faker->text(150);
                    $review->user_id = array_rand($usersId, 1);
                    $review->using_time = rand(1, 34);
                    $review->rating_convenience = rand(1, 5);
                    $review->rating_functions = rand(1, 5);
                    $review->rating_support = rand(1, 5);
                    $review->status = 1;
                    if (!$review->save()) $this->errors[] = $review->errors;
                    $reviews[] = $review;
                }


            }
        }

        if ($this->errors) print_r($this->errors);

    }

    public function actionAddContent($count = 3)
    {

        $usersId = array_flip(\common\models\User::find()->select('id')->column());
        $faker = Factory::create('ru');

        //creating fake category and programs
        foreach (range(1, $count) as $item) {
            $category = new ContentCategories();
            $category->name = $faker->word;
            if (!$category->save()) $this->errors['category'][] = $category->errors;

            foreach (range(1, $count) as $item2) {

                $article = new ContentArticles();
                $article->category_id = $category->id;
                $article->name = $faker->name;
                $article->body = <<<HTML
<h3>$faker->word</h4>
<p>$faker->text</p>
HTML;
                $article->user_id = array_rand($usersId, 1);

                if (!$article->save()) $this->errors['ContentArticles'][] = $article->errors;

                $news = new ContentNews();
                $news->category_id = $category->id;
                $news->name = $faker->name;
                $news->body = <<<HTML
<h3>$faker->word</h4>
<p>$faker->text</p>
HTML;
                $news->user_id = array_rand($usersId, 1);

                if (!$news->save()) $this->errors['ContentNews'][] = $news->errors;


            }
        }

        if ($this->errors) print_r($this->errors);

    }

}