<?php
/* @var $this \yii\web\View */
/* @var $model \common\models\Category */

$this->title = 'View Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container px-5 py-4">
    <div class="row row-cols-1 row-cols-md-12 g-5">
        <?php if (!empty($category)) : ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Title:</strong><?= $category->title ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
