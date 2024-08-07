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
                    <?php
                    $limitedCategories = array_slice($categories, 0, 4);
                    ?>
                    <?php foreach ($limitedCategories as $category): ?>
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

<!-- Top News Start -->
<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="row tn-slider">
                    <!-- Slider content goes here -->
                </div>
            </div>
            <div class="col-md-6 tn-right">
                <div class="row">
                    <!-- Right section content goes here -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News End -->

<!-- Tab News Start -->
<div class="tab-news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Category Tabs -->
                <ul class="nav nav-pills nav-justified">
                    <?php foreach ($categories as $category): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $selectedCategory == $category->id ? 'active' : '' ?>"
                               href="<?= \yii\helpers\Url::to(['/', 'categoryId' => $category->id]) ?>">
                                <?= htmlspecialchars($category->title) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Posts List -->
                <div class="tab-content">
                    <div class="row">
                        <div class="col-md-12">
                            <?= \yii\widgets\ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemView' => '_post_item',
                                'layout' => "{items}\n{pager}",
                            ]) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Tab News End -->


<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="row tn-slider">
                    <!-- Slider content goes here -->
                </div>
            </div>
            <div class="col-md-6 tn-right">
                <div class="row">
                    <!-- Right section content goes here -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News Start-->
<div class="main-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($categories as $category): ?>
                    <div class="col-md-4">
                        <div class="mn-img">
                            <img src="<?= \yii\helpers\Url::to('@web/' . $category->image) ?>" alt="<?= \yii\helpers\Html::encode($category->title) ?>" style="width: 350px; height: 250px;" />
                            <div class="mn-title">
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
<!-- Main News End-->

