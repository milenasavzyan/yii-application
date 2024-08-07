<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string|null $information
 * @property string|null $image
 * @property string $content
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CategoryPost[] $categoryPosts
 */
class Posts extends ActiveRecord
{
    public $categories = [];
    public $imageFile;

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
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['information'], 'string', 'max' => 5000],
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
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class => [
                'class' => TimestampBehavior::class,
            ],
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
    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])
            ->via('categoryPosts');
    }

    public function getCategoryNames()
    {
        return implode(', ', array_map(function($categoryPost) {
            return $categoryPost->category->title;
        }, $this->categoryPosts));
    }

    public function getCategoryOptions()
    {
        return \common\models\Category::find()->select(['title', 'id'])->indexBy('id')->column();
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
    public function saveCategories()
    {
        foreach ($this->categories as $categoryId) {
            $categoryPost = new CategoryPost();
            $categoryPost->post_id = $this->id;
            $categoryPost->category_id = $categoryId;
            $categoryPost->save();
        }
    }
}
