<?php

use yii\db\Migration;

/**
 * Class m190525_174522_init_rbac
 */
class m190525_174522_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $user = new \common\models\User();
        $user->username = 'viktor';
        $user->setPassword(123456);
        $user->email = 'an.viktory@gmail.com';
        $user->save();

        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $createPost = $auth->createPermission('createProgram');
        $createPost->description = 'Create a program';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updateProgram');
        $updatePost->description = 'Update program';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('developer');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 1);
        $auth->assign($admin, 1);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190525_174522_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190525_174522_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
