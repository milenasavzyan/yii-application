<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to('/') ?>">Home</a></li>
            <li class="breadcrumb-item active">News details</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Single News Start -->
<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="view-post">
                    <div class="post-header">
                        <h3><?= Html::encode(strip_tags($model->content)) ?></h3>
                    </div>
                    <div class="post-content">
                        <?php if ($model->image): ?>
                            <img src="<?= Yii::getAlias('@web/' . $model->image) ?>" alt="<?= Html::encode($model->title) ?>" style="width: 100%; height: auto;">
                        <?php endif; ?>
                        <?php if ($model->information): ?>
                            <p><?= Html::encode(strip_tags($model->information)) ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- Display categories for this post -->
                    <div class="sidebar">
                        <div class="post-categories sidebar-widget">
                            <h3>Categories:</h3>
                            <div class="category">
                                <ul>
                                    <?php foreach ($model->categoryPosts as $categoryPost): ?>
                                        <li>
                                            <a href="<?= Url::to(['/', 'categoryId' => $categoryPost->category->id]) ?>">
                                                <?= Html::encode($categoryPost->category->title) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="sn-related">
                    <h2>Other News</h2>
                    <div class="row sn-slider">
                        <?php foreach ($otherNews as $newsItem): ?>
                            <div class="col-md-4">
                                <div class="sn-img">
                                    <?php if ($newsItem->image): ?>
                                        <img src="<?= Yii::getAlias('@web/' . $newsItem->image) ?>" alt="<?= Html::encode($newsItem->title) ?>" style="width: 250px; height: 170px;"/>
                                    <?php endif; ?>
                                    <div class="sn-title">
                                        <a href="<?= \yii\helpers\Url::to(['view', 'id' => $newsItem->id]) ?>"><?= Html::encode($newsItem->title) ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h2 class="sw-title">In This Category</h2>
                        <div class="news-list">
                            <?php foreach ($sameNews as $newsItem): ?>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <?php if ($newsItem->image): ?>
                                            <a href="<?= \yii\helpers\Url::to(['view', 'id' => $newsItem->id]) ?>">
                                                <img src="<?= Yii::getAlias('@web/' . $newsItem->image) ?>" alt="<?= htmlspecialchars($newsItem->title) ?>" />
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="nl-title">
                                        <a href="<?= \yii\helpers\Url::to(['view', 'id' => $newsItem->id]) ?>"><?= Html::encode(strip_tags(mb_strimwidth($newsItem->content, 0, 100, '...'))) ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h2 class="sw-title">News Category</h2>
                        <div class="category">
                            <ul>
                                <?php foreach ($categories as $category): ?>
                                    <li>
                                        <a href="<?= Url::to(['/', 'categoryId' => $category->id]) ?>">
                                            <?= Html::encode($category->title) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single News End -->
