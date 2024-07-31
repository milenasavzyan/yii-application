<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap News Template - Free HTML Templates</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
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
                    <div class="b-search">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->


        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-450x350-1.jpg" />
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-450x350-2.jpg" />
                                    <div class="tn-title">
                                        <a  href="">Integer hendrerit elit eget purus sodales maximus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="tn-title">
                                        <a href="">Gadgets</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="tn-title">
                                        <a href="">Sport</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="tn-title">
                                        <a href="">Technology</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="tn-title">
                                        <a href="">Business</a>
                                    </div>
                                </div>
                            </div>
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

                    <div id="featured" class="container tab-pane active">
                        <?php if (!empty($posts)): ?>
                            <?php foreach ($posts as $post): ?>
                                <div class="tn-news">
                                    <div class="tn-title">
                                        <h6><?= $post->title ?></h6>
                                        <a href=""><?= $post->content ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="tab-content">
                        <?php foreach ($categories as $category): ?>
                            <div id="category-<?= $category->id ?>" class="container tab-pane <?= $selectedCategory == $category->id ? 'active' : '' ?>">
                                <?php if (!empty($categoryPosts)): ?>
                                    <?php foreach ($categoryPosts as $post): ?>
                                        <div class="tn-news">
                                            <div class="tn-title">
                                                <h6><?= htmlspecialchars($post->title) ?></h6>
                                                <a href=""><?= htmlspecialchars($post->content) ?></a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
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
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="mn-title">
                                        <a href="">Business</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="mn-title">
                                        <a href="">Sport</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="mn-title">
                                        <a href="">Technology</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-5.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="mn-title">
                                        <a href="">Gadgets</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="mn-title">
                                        <a href="">Sport</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News End-->

        <!-- Footer Start -->
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
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Useful Links</h3>
                            <ul>
                                <li><a href="#">Lorem ipsum</a></li>
                                <li><a href="#">Pellentesque</a></li>
                                <li><a href="#">Aenean vulputate</a></li>
                                <li><a href="#">Vestibulum sit amet</a></li>
                                <li><a href="#">Nam dignissim</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Quick Links</h3>
                            <ul>
                                <li><a href="#">Lorem ipsum</a></li>
                                <li><a href="#">Pellentesque</a></li>
                                <li><a href="#">Aenean vulputate</a></li>
                                <li><a href="#">Vestibulum sit amet</a></li>
                                <li><a href="#">Nam dignissim</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Newsletter</h3>
                            <div class="newsletter">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed porta dui. Class aptent taciti sociosqu
                                </p>
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
        <!-- Footer End -->

        <!-- Footer Menu Start -->
        <div class="footer-menu">
            <div class="container">
                <div class="f-menu">
                    <a href="">Terms of use</a>
                    <a href="">Privacy policy</a>
                    <a href="">Cookies</a>
                    <a href="">Accessibility help</a>
                    <a href="">Advertise with us</a>
                    <a href="">Contact us</a>
                </div>
            </div>
        </div>
        <!-- Footer Menu End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="">Your Site Name</a>. All Rights Reserved</p>
                    </div>

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <div class="col-md-6 template-by">
                        <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
