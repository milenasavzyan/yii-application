<?php
/* @var $this yii\web\View */
/* @var $category common\models\Category */
/* @var $childCategories common\models\Category[] */

use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $category->title;

?>


<?php if (!empty($childCategories)): ?>
    <div class="container">
        <div class="row">
            <?php foreach ($childCategories as $childCategory): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= Url::to('@web/uploads/' . $childCategory->image) ?>" alt="<?= Html::encode($childCategory->title) ?>" class="card-img-top" style="100px: auto; width: 350px;">
                        <div class="card-body text-center">
                            <h4 class="card-title"><?= Html::a(Html::encode($childCategory->title), ['category/index', 'id' => $childCategory['id']], ['class' => 'stretched-link']) ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <p>No child categories.</p>
<?php endif; ?>
