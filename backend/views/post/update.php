<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */

$this->title = 'Update Posts: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="posts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parentCategories' => $parentCategories,
        'childCategories' => $childCategories,
    ]) ?>

</div>
