<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */

$this->title = 'Create Posts';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
//        'categories' => $categories,
        'parentCategories' => $parentCategories,
        'childCategories' => $childCategories,
    ]) ?>

</div>
