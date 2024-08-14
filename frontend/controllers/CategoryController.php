<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Posts;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public function actionIndex($id)
    {
        // Find the category by its ID
        $category = Category::findOne($id);
        if (!$category) {
            throw new NotFoundHttpException('Category not found.');
        }

        // Get posts related to this category
        $posts = $category->posts;

        // Render the view with the category and posts
        return $this->render('index', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }
    public function actionView($id)
    {
        $category = Category::findOne($id);

        if ($category === null) {
            throw new \yii\web\NotFoundHttpException('The requested category does not exist.');
        }

        $childCategories = $category->getChildren()->all();

        return $this->render('view', [
            'category' => $category,
            'childCategories' => $childCategories,
        ]);
    }
}