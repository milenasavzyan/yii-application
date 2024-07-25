<?php
/* @var $this \yii\web\View */
/* @var $model \common\models\Post */

use yii\grid\GridView;


$this->title = 'View Post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container px-5 py-4">
    <div class="row row-cols-1 row-cols-md-12 g-5">
        <?php if (!empty($post)) : ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Title:</strong><?= $post->title ?></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><strong>Content:</strong><?= $post->content ?></li>
                        </ul>
                        <strong>Categories:</strong>
                        <?= GridView::widget([
                            'dataProvider' => new \yii\data\ActiveDataProvider([
                                'query' => $post->getCategories(),
                                'pagination' => false,
                            ]),
                            'columns' => [
                                'id',
                                'title',
                            ],
                        ]); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
