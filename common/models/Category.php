<?php

namespace common\models;

use backend\models\CategoryPost;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function rules()
    {

        return[
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['id' => 'post_id'])
            ->via('categoryPosts');
    }

    public function getCategoryPosts()
    {
        return $this->hasMany(CategoryPost::class, ['category_id' => 'id']);
    }
}