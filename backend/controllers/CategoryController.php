<?php

namespace backend\controllers;

use common\models\Category;
use backend\models\CategorySearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends AdminController
{

    /**
     * Lists all Category models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionCreate()
    {
        $model = new Category();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $imageFile = \yii\web\UploadedFile::getInstance($model, 'image');
                if ($imageFile) {
                    $uploadPath = Yii::getAlias('@frontend/web/uploads/');

                    $imagePath = $uploadPath . uniqid() . '.' . $imageFile->extension;
                    if ($imageFile->saveAs($imagePath)) {
                        $model->image = basename($imagePath);
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to save image.');
                    }
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $imageFile = \yii\web\UploadedFile::getInstance($model, 'image');
                if ($imageFile) {
                    $uploadPath = Yii::getAlias('@frontend/web/uploads/');

                    $imagePath = $uploadPath . uniqid() . '.' . $imageFile->extension;
                    if ($imageFile->saveAs($imagePath)) {
                        $model->image = basename($imagePath);
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to save image.');
                    }
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
