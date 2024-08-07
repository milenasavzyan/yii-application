<?php
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var string $query */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Search Results for: ' . Html::encode($query);
?>
<!-- Top News Start-->
<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="row tn-slider">
                    <?php foreach ($categories as $category): ?>
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="<?= \yii\helpers\Url::to('@web/' . $category->image) ?>" alt="<?= \yii\helpers\Html::encode($category->title) ?>" style="width: 600px; height: 346px;" />
                                <div class="tn-title">
                                    <a href="<?= \yii\helpers\Url::to(['/', 'categoryId' => $category->id]) ?>"><?= $category->title ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6 tn-right">
                <div class="row">
                    <?php foreach ($categories as $category): ?>
                        <div class="col-md-6">
                            <div class="tn-img">
                                <?php if ($category->image): ?>
                                    <img src="<?= \yii\helpers\Url::to('@web/' . $category->image) ?>" alt="<?= \yii\helpers\Html::encode($category->title) ?>" style="width: 300px; height: 173px;" />
                                <?php endif; ?>
                                <div class="tn-title">
                                    <a href="<?= \yii\helpers\Url::to(['/', 'categoryId' => $category->id]) ?>"><?= $category->title ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News End-->

<div class="tab-news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-search">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <?php if ($dataProvider->getCount() > 0): ?>
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_post_item',
                            'layout' => "{items}\n{pager}",
                        ]) ?>
                    <?php else: ?>
                        <p>No results found for "<?= Html::encode($query) ?>"</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


