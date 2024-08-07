<?php

namespace backend\controllers;

use common\models\Posts;
use backend\models\PostSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * PostController implements the CRUD actions for Posts model.
 */
class PostController extends AdminController
{

    /**
     * Lists all Posts models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Posts model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Posts();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $imageFile = \yii\web\UploadedFile::getInstance($model, 'imageFile');

                if ($imageFile) {
                    $uploadPath = Yii::getAlias('@frontend/web/uploads/');

                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0775, true);
                    }

                    $imagePath = $uploadPath . uniqid() . '.' . $imageFile->extension;

                    if ($imageFile->saveAs($imagePath)) {
                        $model->image = 'uploads/' . basename($imagePath);
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to save image.');
                    }
                }

                if ($model->save()) {
                    $model->saveCategories();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'categoryOptions' => $model->getCategoryOptions(),
        ]);
    }




    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->categories = ArrayHelper::getColumn(
            $model->categoryPosts,
            'category_id'
        );

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $imageFile = \yii\web\UploadedFile::getInstance($model, 'imageFile');

                if ($imageFile) {
                    $uploadPath = Yii::getAlias('@frontend/web/uploads/');

                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0775, true);
                    }

                    if ($model->image && file_exists(Yii::getAlias('@frontend/web/') . $model->image)) {
                        unlink(Yii::getAlias('@frontend/web/') . $model->image);
                    }

                    $imagePath = $uploadPath . uniqid() . '.' . $imageFile->extension;

                    if ($imageFile->saveAs($imagePath)) {
                        $model->image = 'uploads/' . basename($imagePath);
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to save image.');
                    }
                }

                if ($model->save()) {
                    $model->saveCategories();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
            'categoryOptions' => $model->getCategoryOptions(),
        ]);
    }


    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $imagePath = Yii::getAlias('@frontend/web/') . $model->image;

        if ($model->image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Post has been deleted successfully.');
        } else {
            Yii::$app->session->setFlash('error', 'Failed to delete the post.');
        }

        return $this->redirect(['index']);
    }


    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
