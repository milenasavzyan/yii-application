<?php

namespace common\models;

use Yii;
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
    public $parent_category;
    public $child_categories = [];


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
            [['created_at', 'updated_at', 'parent_category'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['information'], 'string', 'max' => 5000],
            [['child_categories'], 'each', 'rule' => ['integer']],
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
     * Saves the categories.
     */
    public function saveCategories($categories)
    {
        if ($categories) {
            $this->addCategory($categories);
        }
    }

    /**
     * Updates the categories for this post.
     */

    public function updateCategories()
    {
        $categories = Yii::$app->request->post('Categories', []);
        $this->addCategory($categories);
    }

    protected function addCategory($categories)
    {
        Yii::$app->db->createCommand()
            ->delete('category_post', ['post_id' => $this->id])
            ->execute();

        foreach ($categories as $categoryId) {
            Yii::$app->db->createCommand()
                ->insert('category_post', [
                    'post_id' => $this->id,
                    'category_id' => $categoryId,
                ])
                ->execute();
        }

    }

}
