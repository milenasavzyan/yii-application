<?php

namespace backend\controllers;

use backend\models\PostSearch;
use backend\models\CategoryPost;
use common\models\Post;
use Yii;
use yii\web\NotFoundHttpException;

class PostController extends SiteController
{
    /**
     * Lists all posts.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $post = $this->findModel($id);

        return $this->render('view', [
            'post' => $post,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $categories = Yii::$app->request->post('Post')['categories'];
            if (!empty($categories)) {
                foreach ($categories as $categoryId) {
                    $categoryPost = new CategoryPost();
                    $categoryPost->post_id = $model->id;
                    $categoryPost->category_id = $categoryId;
                    $categoryPost->save();
                }
            }

            Yii::$app->session->setFlash('success', 'Post created successfully.');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $categories = Yii::$app->request->post('Post')['categories'];
            CategoryPost::deleteAll(['post_id' => $model->id]);

            if (!empty($categories)) {
                foreach ($categories as $categoryId) {
                    $categoryPost = new CategoryPost();
                    $categoryPost->post_id = $model->id;
                    $categoryPost->category_id = $categoryId;
                    $categoryPost->save();
                }
            }

            Yii::$app->session->setFlash('success', 'Post updated successfully.');
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', 'Post deleted successfully.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
