<?php

namespace blog\models;

use Yii;
use dektrium\user\models\User;
/**
 * This is the model class for table "blog_posts".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $comments
 * @property string $title
 * @property string $body
 * @property string $thumbnail
 * @property string $excerpt
 * @property string $status
 * @property string $slug
 * @property string $update_time
 * @property integer $update_by
 * @property string $create_time
 * @property integer $create_by
 *
 * @property BlogComments[] $blogComments
 * @property User $user
 */
class BlogPost extends \cms\components\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['user_id', 'comments', 'update_by', 'create_by'], 'integer'],
            ['user_id', 'default', 'value' => Yii::$app->user->id],
            [['body', 'excerpt'], 'string'],
            [['update_time', 'create_time'], 'safe'],
            [['title', 'thumbnail'], 'string', 'max' => 555],
            [['status'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'comments' => 'Comments',
            'title' => 'Title',
            'body' => 'Body',
            'thumbnail' => 'Thumbnail',
            'excerpt' => 'Excerpt',
            'status' => 'Status',
            'slug' => 'Slug',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogComments()
    {
        return $this->hasMany(BlogComments::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
