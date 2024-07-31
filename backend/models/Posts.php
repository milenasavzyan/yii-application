<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CategoryPost[] $categoryPosts
 */
class Posts extends \yii\db\ActiveRecord
{
    public $categories = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'created_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['categories'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'categories' => 'Categories',
        ];
    }

    /**
     * Gets query for [[CategoryPosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryPosts()
    {
        return $this->hasMany(CategoryPost::class, ['post_id' => 'id']);
    }
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id']); // Adjust 'cat_id' to the correct column name
    }
    public function getCategoryNames()
    {
        return implode(', ', array_map(function($categoryPost) {
            return $categoryPost->category->title;
        }, $this->categoryPosts));
    }

    public function getCategoryOptions()
    {
        return \backend\models\Category::find()->select(['title', 'id'])->indexBy('id')->column();
    }

    /**
     * Updates the categories for this post.
     */
    public function updateCategories()
    {
        CategoryPost::deleteAll(['post_id' => $this->id]);

        $this->saveCategories();
    }

    /**
     * Saves the selected categories for this post.
     */
    protected function saveCategories()
    {
        foreach ($this->categories as $categoryId) {
            $categoryPost = new CategoryPost();
            $categoryPost->post_id = $this->id;
            $categoryPost->category_id = $categoryId;
            $categoryPost->save();
        }
    }

}
