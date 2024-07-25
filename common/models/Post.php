<?php

namespace common\models;

use backend\models\CategoryPost;

class Post extends \yii\db\ActiveRecord
{
    public $categories;
    public $category;


    public static function tableName()
    {
        return '{{%posts}}';
    }

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['content'], 'string'],
            [['categories'], 'safe'],
        ];
    }
    public function getCategoryPosts()
    {
        return $this->hasMany(CategoryPost::class, ['post_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])
            ->viaTable('category_post', ['post_id' => 'id']);
    }
}