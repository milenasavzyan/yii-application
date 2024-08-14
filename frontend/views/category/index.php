<?php
/* @var $this yii\web\View */
/* @var $category common\models\Category */
/* @var $posts common\models\Posts[] */

use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $category->title;
?>

<h1><?= Html::encode($category->title) ?></h1>

<?php if (!empty($posts)): ?>
    <div class="container">
        <div class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= Url::to('@web/uploads/' . $post->image) ?>" alt="<?= Html::encode($post->title) ?>" class="card-img-top" style="100px: auto; width: 350px;">
                        <div class="card-body text-center">
                            <h4 class="card-title"><?= Html::a(Html::encode($post->title), ['/view', 'id' => $post->id], ['class' => 'stretched-link']) ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <p>No posts found in this category.</p>
<?php endif; ?>
