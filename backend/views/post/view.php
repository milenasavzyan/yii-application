<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Posts $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'image',
                'value' => function($model) {
                    $imagePath = Yii::getAlias('@frontend/web/uploads/' . $model->image);
                    if (file_exists($imagePath)) {
                        return Html::img('/uploads/' . basename($model->image), ['width' => '100px']);
                    } else {
                        return 'Image not found';
                    }
                },
                'format' => 'raw',
            ],
            'content:ntext',
            'information:ntext',
            [
                'attribute' => 'categories',
                'value' => function($model) {
                    return $model->getCategoryNames();
                },
                'format' => 'text',
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
