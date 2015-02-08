<?php

use yii\db\Schema;

class m150208_063216_blog_init extends \yii\db\Migration
{
    public function safeup()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%blog_posts}}',[
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'comments' => Schema::TYPE_BOOLEAN,
            'title' => Schema::TYPE_STRING . '(555)',
            'body' => Schema::TYPE_TEXT,
            'thumbnail' => Schema::TYPE_STRING . '(555)',
            'excerpt' => Schema::TYPE_TEXT,
            'status' => Schema::TYPE_STRING . '(20)',
            'slug' => Schema::TYPE_STRING . '(45)',
            'status' => Schema::TYPE_STRING . ' NOT NULL DEFAULT "active"',
            'update_time' => Schema::TYPE_DATETIME . ' DEFAULT NULL',
            'update_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'create_time' => Schema::TYPE_DATETIME . ' DEFAULT NULL',
            'create_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
        ],$tableOptions);

        $this->createTable('{{%blog_comments}}',[
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'comment' => Schema::TYPE_TEXT,
            'approved' => Schema::TYPE_STRING . '(20) NULL',
            'parent' => Schema::TYPE_INTEGER,
            'author_name' => Schema::TYPE_STRING . '(255) NULL',
            'author_email' => Schema::TYPE_STRING . '(255) NULL',
            'author_url' => Schema::TYPE_STRING . '(255) NULL',
            'author_ip' => Schema::TYPE_STRING . '(255) NULL',
            'notify_reply' => Schema::TYPE_BOOLEAN,
            'notify_comments' => Schema::TYPE_BOOLEAN,
            'status' => Schema::TYPE_STRING . ' NOT NULL DEFAULT "active"',
            'update_time' => Schema::TYPE_DATETIME . ' DEFAULT NULL',
            'update_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'create_time' => Schema::TYPE_DATETIME . ' DEFAULT NULL',
            'create_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
        ],$tableOptions);

        $this->addForeignKey('blog_posts_user_id','{{%blog_posts}}','user_id','{{%user}}','id','NO ACTION','NO ACTION');
        $this->addForeignKey('blog_comments_user_id','{{%blog_comments}}','user_id','{{%user}}','id','NO ACTION','NO ACTION');
        $this->addForeignKey('blog_comments_post_id','{{%blog_comments}}','post_id','{{%blog_posts}}','id','NO ACTION','NO ACTION');
    }

    public function safedown()
    {
        $this->dropForeignKey('blog_posts_user_id','{{%blog_posts}}');
        $this->dropForeignKey('blog_comments_user_id','{{%blog_comments}}');
        $this->dropForeignKey('blog_comments_post_id','{{%blog_comments}}');

        $this->dropTable('{{%blog_posts}}');
        $this->dropTable('{{%blog_comments}}');
    }
}