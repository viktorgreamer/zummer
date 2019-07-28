<?php

use yii\db\Migration;

/**
 * Class m190728_062008_create_table_content_themes_assignment
 */
class m190728_062008_create_table_content_themes_assignment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content_themes_article_assignment}}', [
            'article_id' => $this->integer()->notNull(),
            'theme_id' => $this->integer()->notNull()
        ]);
        $this->createIndex('idx-content_themes_article_assignment-article_id','{{%content_themes_article_assignment}}','article_id');
        $this->createIndex('idx-content_themes_article_assignment-theme_id','{{%content_themes_article_assignment}}','theme_id');
       
        $this->addForeignKey('fk-content_themes_article_assignment-article_id-id',
           '{{%content_themes_article_assignment}}',
           'article_id','{{%content_articles}}','id','CASCADE','CASCADE');
       
       $this->addForeignKey('fk-content_themes_article_assignment-theme_id-id',
           '{{%content_themes_article_assignment}}',
           'theme_id','{{%content_themes}}','id','CASCADE','CASCADE');
       
       
        $this->createTable('{{%content_themes_news_assignment}}', [
            'new_id' => $this->integer()->notNull(),
            'theme_id' => $this->integer()->notNull()
        ]);
        $this->createIndex('idx-content_themes_news_assignment-new_id','{{%content_themes_news_assignment}}','new_id');
        $this->createIndex('idx-content_themes_news_assignment-theme_id','{{%content_themes_news_assignment}}','theme_id');
       
        $this->addForeignKey('fk-content_themes_news_assignment-new_id-id',
           '{{%content_themes_news_assignment}}',
           'new_id','{{%content_news}}','id','CASCADE','CASCADE');
       
       $this->addForeignKey('fk-content_themes_news_assignment-theme_id-id',
           '{{%content_themes_news_assignment}}',
           'theme_id','{{%content_themes}}','id','CASCADE','CASCADE');
       

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {   
        $this->dropForeignKey('fk-content_themes_article_assignment-article_id-id',
        '{{%content_themes_article_assignment}}');
        $this->dropForeignKey('fk-content_themes_article_assignment-theme_id-id',
            '{{%content_themes_article_assignment}}');
        $this->dropTable('{{%content_themes_article_assignment}}');

        $this->dropForeignKey('fk-content_themes_news_assignment-new_id-id',
        '{{%content_themes_news_assignment}}');

        $this->dropForeignKey('fk-content_themes_news_assignment-theme_id-id',
            '{{%content_themes_news_assignment}}');

        $this->dropTable('{{%content_themes_news_assignment}}');
     
        
        
        
    }
}
