<?php

/** @var \yii\web\View $this */
/** @var string $content */
/** @var \common\models\Category[] $categories */
/** @var \yii\data\ActiveDataProvider $dataProvider */

use app\components\MenuWidget;
use common\models\Category;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

AppAsset::register($this);
$categories = Category::find()->where(['parent_id' => 0])->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="tb-contact">
                        <p><i class="fas fa-envelope"></i>info@mail.com</p>
                        <p><i class="fas fa-phone-alt"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tb-menu">
                        <a href="<?= \yii\helpers\Url::to('/site/about') ?>">About</a>
                        <a href="<?= \yii\helpers\Url::to('/site/contact') ?>">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Start -->
    <div class="brand">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="b-logo">
                        <a href="<?= \yii\helpers\Url::to('/') ?>">
                            <img src="img/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- Brand Search Section -->
                    <div class="b-search">
                        <form action="<?= \yii\helpers\Url::to(['site/search']) ?>" method="get" class="form-inline">
                            <input type="text" name="query" placeholder="Search" value="<?= Yii::$app->request->get('query') ?>" class="form-control">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="<?= \yii\helpers\Url::to('/') ?>" class="nav-item nav-link active">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Categories</a>
                                <?= MenuWidget::widget(['tpl' => 'menu']) ?>
                        </div>

                        <a href="<?= \yii\helpers\Url::to('/site/about') ?>" class="nav-item nav-link">About Us</a>
                        <a href="<?= \yii\helpers\Url::to('/site/contact') ?>" class="nav-item nav-link">Contact Us</a>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <a href="<?= \yii\helpers\Url::to('/admin/site/login') ?>" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Get in Touch</h3>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>123 News Street, NY, USA</p>
                            <p><i class="fa fa-envelope"></i>info@example.com</p>
                            <p><i class="fa fa-phone"></i>+123-456-7890</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Useful Links</h3>
                        <ul>
                            <li><a href="<?= \yii\helpers\Url::to('/') ?>">Home</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/contact') ?>">Contacts</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/about') ?>">About</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Quick Links</h3>
                        <ul>
                            <li><a href="<?= \yii\helpers\Url::to('/') ?>">Home</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/contact') ?>">Contacts</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/about') ?>">About</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Newsletter</h3>
                        <div class="newsletter">
                            <p>Receive the latest updates, exclusive offers, and insightful articles right in your inbox. Don’t miss out on what’s happening at News!</p>
                            <form>
                                <input class="form-control" type="email" placeholder="Your email here">
                                <button class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-menu">
        <div class="container">
            <div class="f-menu">
                <a href="<?= \yii\helpers\Url::to('/') ?>">Home</a>
                <a href="<?= \yii\helpers\Url::to('/site/about') ?>">About</a>
                <a href="<?= \yii\helpers\Url::to('/site/contact') ?>">Contact us</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright © <a href="">Your Site Name</a>. All Rights Reserved</p>
                </div>

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                <div class="col-md-6 template-by">
                    <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
