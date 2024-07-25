<?php

/* @var $this \yii\web\View */
/* @var $searchModel \backend\models\CategorySearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\bootstrap5\Html;

$this->title = 'Category';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="form-group">
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>