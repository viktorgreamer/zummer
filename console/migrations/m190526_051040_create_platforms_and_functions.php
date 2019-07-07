<?php

use yii\db\Migration;

/**
 * Class m190526_054453_create_platforms_and_functions
 */
class m190526_051040_create_platforms_and_functions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $faker = Faker\Factory::create('ru');

        $functions = [
            'Звонки', 'Контроль пользоателей', 'Мульти-платформенность', "Воронка продаж", "Статистика",
            'Интеграция с 1С', 'Интеграция с МОЙ СКЛАД ', 'IP Телефония', "Контроль доступа", "Отправка Смс",
        ];
        $result = [];
        // creating fake functions
        foreach ($functions as $key => $item) {
            $function = new \common\models\Functions();
            $function->description = $faker->text(400);
            $function->priority = $key;
            $function->name = $item;
            $result[] = $function->save();
        }

        $platforms = [
            'Windows', 'Android', 'MacOs', 'IOS', 'Browser', 'Ubuntu', "ChromeOS"
        ];

        foreach ($platforms as $platform) {
            $new_platform = new \common\models\Platforms();
            $new_platform->name = $platform;
            $result[] = $new_platform->save();
        }

        if (array_filter($result, function ($item) {
            return $item === false;
        })) return false;


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190526_054453_create_platforms_and_functions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190526_054453_create_platforms_and_functions cannot be reverted.\n";

        return false;
    }
    */
}
