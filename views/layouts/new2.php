<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My App</title>
    <!-- favicons Icons -->

    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Nisoz HTML Template For Creative Agency" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/nisoz-icons/style.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/assets/owl.theme.default.min.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/nisoz.css" />
</head>

<body class="custom-cursor">
    <?php $this->beginBody() ?>

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/loader.png);"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <section class="topbar">
            <div class="container-fluid">
                <div class="topbar__wrapper">
                    <ul class="list-unstyled topbar__list">
                        <li>
                            <span class="fas fa-envelope"></span>
                            <a href="mailto:needhelp@company.com">needhelp@company.com</a>
                        </li>
                        <li>
                            <span class="fas fa-map-marker"></span>
                            88 Broklyn Golden Street. New York
                        </li>
                    </ul><!-- /.icon-box -->
                    <ul class="list-unstyled topbar__menu">
                        <li><a href="faq.html">Help</a></li>
                        <li><a href="about.html">Support</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul><!-- /.list-menu -->
                    <div class="topbar__social">
                        <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    </div><!-- /.social-links -->
                </div>
            </div>
        </section><!-- /.topbar-header -->

        <header class="main-header">
            <?php
            NavBar::begin([
                'options' => [
                    'class' => 'main-menu navbar-expand-md fixed-top',
                ],
            ]);

            ?>

            <div class="container-fluid">
                <div class="main-menu__logo">
                    <a href="index.html">
                        <img src="assets/images/logo-light.png" width="96" height="34" alt="Ogency">
                    </a>
                </div><!-- /.main-menu__logo -->

                <div class="main-menu__nav">
                    <?= Nav::widget([
                        'options' => ['class' => 'main-menu__list navbar-nav'],
                        'items' => [
                            ['label' => 'Home', 'url' => ['/site/index']],
                            ['label' => 'About', 'url' => ['/site/about']],
                            ['label' => 'Contact', 'url' => ['/site/contact']],
                            ['label' => 'Admin', 'url' => ['/admin']],
                            [
                                'label' => 'Запросы',
                                'items' => [
                                    ['label' => '1) Спортивные сооружения указанного типа', 'url' => ['/structure/index']],
                                    ['label' => '2) Спортсмены для вида спорта и разряда', 'url' => ['/sportsmens/index']],
                                    ['label' => '3) Спортсмены для тренеров и разряд', 'url' => ['/sportsmen-treners/index']],
                                    ['label' => '4) Спортсмены и виды спорта', 'url' => ['/sportsmen-vid-sporta/index']],
                                    ['label' => '5) Тренеры для спортсмена', 'url' => ['/treners-sportsmens/index']],
                                    ['label' => '6) Перечень соревнований по периоду и организатору', 'url' => ['/sorevnovaniya-org/index']],
                                    ['label' => '7) Перечен призеров', 'url' => ['/prizer/index']],
                                    ['label' => '8) Перечень соревнований в сооружениях и виду спорта', 'url' => ['/sorevnovaniya-structure/index']],
                                    ['label' => '9) Перечень клубов и участников соревнований по периоду', 'url' => ['/sport-club/index']],
                                    ['label' => '10) Список тренеров по виду спорта', 'url' => ['/treners/index']],
                                    ['label' => '11) Список спортсменов не участвовавших в соревах по периоду', 'url' => ['/sportsmen-sorevnovaniya/index']],
                                    ['label' => '12) Список организаторов по периоду', 'url' => ['/org/index']],
                                    ['label' => '13) Список сооружений по периоду', 'url' => ['/sport/index']],
                                ],
                            ],
                            [
                                'label' => '1,3 лабы',
                                'items' => [
                                    ['label' => '1 laba - Sorev', 'url' => ['/sorevnovaniya/index']],
                                    ['label' => '3 laba - SorevCRUD', 'url' => ['/sorevnovaniya-c-r-u-d/index']],
                                ],
                            ],
                            Yii::$app->user->isGuest
                                ? ['label' => 'Login', 'url' => ['/site/login']]
                                : [
                                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                    'url' => ['/site/logout'],
                                    'linkOptions' => ['data-method' => 'post']
                                ],
                        ],
                    ]); ?>
                </div><!-- /.main-menu__nav -->

                <div class="main-menu__right">
                    <a href="#" class="main-menu__toggler mobile-nav__toggler">
                        <i class="fa fa-bars"></i>
                    </a><!-- /.mobile menu btn -->
                </div><!-- /.main-menu__right -->
            </div><!-- /.container -->

            <?php NavBar::end(); ?>
        </header><!-- /.main-header -->

        <div slider>

            <div class="stricky-header stricked-menu main-menu">
                <div class="sticky-header__content"></div>
            </div><!-- /.stricky-header -->

            <!--Main Slider Start-->
            <section class="main-slider">
                <div class="main-slider__one nisoz-owl__carousel owl-carousel" data-owl-options='{
                    "loop": true,
                    "animateOut": "slideOutDown",
                    "animateIn": "fadeIn",
                    "items": 1,
                    "smartSpeed": 1000, 
                    "autoplay": false, 
                    "autoplayTimeout": 6000, 
                    "autoplayHoverPause": true,
                    "nav": false,
                    "dots": true,
                    "margin": 0
                    }'>

                    <div class="item"><!-- 1 slider item start -->
                        <div class="main-slider__item">
                            <div class="main-slider__shape-1">
                                <img src="assets/images/shapes/slider-1-bg-1.png" alt="nisoz">
                            </div><!-- shape-one -->
                            <div class="main-slider__shape-2">
                                <img src="assets/images/shapes/slider-1-shape-1.png" alt="nisoz">
                            </div><!-- shape-two -->
                            <div class="main-slider__shape-3">
                                <img src="assets/images/backgrounds/slier-1-bg-1.jpg" alt="nisoz">
                            </div><!-- shape-three -->

                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="main-slider__content">
                                            <h2 class="main-slider__title">Creative <br>Services For <br>Your Business</h2>
                                            <!-- slider-title -->
                                            <p class="main-slider__text">We are delivering the best services to our customers.
                                            </p><!-- slider-text -->
                                            <div class="main-slider__btn">
                                                <a href="about.html" class="nisoz-btn">
                                                    <span class="nisoz-btn__shape"></span><span
                                                        class="nisoz-btn__shape"></span><span
                                                        class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span>
                                                    <span class="nisoz-btn__text">Discover More</span>
                                                </a><!-- /.btn -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- 1 slider item end -->

                    <div class="item"><!-- 2 slider item start -->
                        <div class="main-slider__item">
                            <div class="main-slider__shape-1">
                                <img src="assets/images/shapes/slider-1-bg-1.png" alt="nisoz">
                            </div><!-- shape-one -->
                            <div class="main-slider__shape-2">
                                <img src="assets/images/shapes/slider-1-shape-1.png" alt="nisoz">
                            </div><!-- shape-two -->
                            <div class="main-slider__shape-3">
                                <img src="assets/images/backgrounds/slier-1-bg-2.jpg" alt="nisoz">
                            </div><!-- shape-three -->
                            <div class="main-slider__shape-4">
                                <img src="assets/images/shapes/slider-1-shape-2.png" alt="nisoz">
                            </div><!-- shape-four -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="main-slider__content">
                                            <h2 class="main-slider__title">Creative <br>Services For <br>Your Business</h2>
                                            <!-- slider-title -->
                                            <p class="main-slider__text">We are delivering the best services to our customers.
                                            </p><!-- slider-text -->
                                            <div class="main-slider__btn">
                                                <a href="about.html" class="nisoz-btn">
                                                    <span class="nisoz-btn__shape"></span><span
                                                        class="nisoz-btn__shape"></span><span
                                                        class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span>
                                                    <span class="nisoz-btn__text">Discover More</span>
                                                </a><!-- /.btn -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- 2 slider item end -->

                    <div class="item"><!-- 3 slider item start -->
                        <div class="main-slider__item">
                            <div class="main-slider__shape-1">
                                <img src="assets/images/shapes/slider-1-bg-1.png" alt="nisoz">
                            </div><!-- shape-one -->
                            <div class="main-slider__shape-2">
                                <img src="assets/images/shapes/slider-1-shape-1.png" alt="nisoz">
                            </div><!-- shape-two -->
                            <div class="main-slider__shape-3">
                                <img src="assets/images/backgrounds/slier-1-bg-3.jpg" alt="nisoz">
                            </div><!-- shape-three -->
                            <div class="main-slider__shape-4">
                                <img src="assets/images/shapes/slider-1-shape-2.png" alt="nisoz">
                            </div><!-- shape-four -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="main-slider__content">
                                            <h2 class="main-slider__title">Creative <br>Services For <br>Your Business</h2>
                                            <!-- slider-title -->
                                            <p class="main-slider__text">We are delivering the best services to our customers.
                                            </p><!-- slider-text -->
                                            <div class="main-slider__btn">
                                                <a href="about.html" class="nisoz-btn">
                                                    <span class="nisoz-btn__shape"></span><span
                                                        class="nisoz-btn__shape"></span><span
                                                        class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span>
                                                    <span class="nisoz-btn__text">Discover More</span>
                                                </a><!-- /.btn -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- 3 slider item end -->

                </div>
            </section>
            <!--Main Slider End-->
        </div>

        <!-- Контент Start -->
        <main id="main" class="flex-shrink-0" role="main">
            <div class="container">
                <?php if (!empty($this->params['breadcrumbs'])): ?>
                    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                <?php endif ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </main>
        <!-- Контент End -->

        <!-- About Start -->
        <!-- <section class="about-one" style="background-image: url(assets/images/shapes/about-1-bg-1.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-one__thumb">
                            <div class="about-one__thumb__one wow fadeInLeft" data-wow-delay="100ms">
                                <img src="assets/images/resources/about-1-1.jpg" alt="nisoz">
                            </div>
                            <div class="about-one__thumb__two nisoz-tilt" data-tilt-options='{ "glare": false, "maxGlare": 0, "maxTilt": 10, "speed": 700, "scale": 1 }'>
                                <img src="assets/images/resources/about-1-2.jpg" alt="nisoz">
                            </div>
                            <div class="about-one__fact-wrapper wow fadeInUp" data-wow-delay="200ms">
                                <div class="about-one__fact">
                                    <div class="about-one__fact__icon"><span class="icon-expertise"></span></div>
                                    <div class="about-one__fact__count">
                                        <span class="count-box">
                                            <span class="count-text" data-stop="30" data-speed="1500"></span>
                                        </span>+
                                    </div>
                                    <h3 class="about-one__fact__title">Years Experience</h3>
                                </div>
                                <div class="about-one__fact">
                                    <div class="about-one__fact__icon"><span class="icon-development"></span></div>
                                    <div class="about-one__fact__count">
                                        <span class="count-box">
                                            <span class="count-text" data-stop="28" data-speed="1500"></span>
                                        </span>+
                                    </div>
                                    <h3 class="about-one__fact__title">experienced team</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-one__content">
                            <div class="section-title">
                                <div class="section-title__triangle">
                                    <span class="section-title__triangle-left"></span>
                                    <span class="section-title__triangle-right"></span>
                                </div>
                                <h5 class="section-title__tagline">about agency</h5>
                                <h2 class="section-title__title">we’re solutions to your creative business</h2>
                            </div>
                            <p class="about-one__content__text">
                                There are many variations of simply free text passages of available but the majority have suffered alteration in some form,
                                by injected hum randomised words which don't slightly.
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-one__box">
                                        <div class="about-one__box__top">
                                            <h4 class="about-one__box__title">get free consultation</h4>
                                            <div class="about-one__box__icon"><span class="icon-customer-support"></span></div>
                                        </div>
                                        <p class="about-one__box__text">Good knowledge becuase done something many times.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-one__box">
                                        <div class="about-one__box__top">
                                            <h4 class="about-one__box__title">High quality projects</h4>
                                            <div class="about-one__box__icon"><span class="icon-good-quality"></span></div>
                                        </div>
                                        <p class="about-one__box__text">Good knowledge becuase done something many times.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="about-one__progress">
                                <h4 class="about-one__progress--title">Website Designing</h4>
                                <div class="about-one__progress--bar">
                                    <div class="about-one__progress--inner count-bar" data-percent="77%">
                                        <div class="about-one__progress--number count-text">77%</div>
                                    </div>
                                </div>
                            </div>
                            <a href="about.html" class="nisoz-btn">
                                <span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span>
                                <span class="nisoz-btn__text">Discover More</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- About End -->

        <!--Google Map Start-->
        <section class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3831.10021723342!2d39.712859661850594!3d47.23620567845806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e3bbd25efc8dab%3A0xe71795934da757ba!2z0JTQvtC90YHQutC-0Lkg0LPQvtGB0YPQtNCw0YDRgdGC0LLQtdC90L3Ri9C5INGC0LXRhdC90LjRh9C10YHQutC40Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgg!5e0!3m2!1sru!2sru!4v1717487879917!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <!--Google Map End-->

        <footer class="main-footer">
            <div class="main-footer__bg" style="background-image: url(assets/images/shapes/footer-bg-1.png);"></div>
            <div class="container">
                <div class="main-footer__top wow fadeInUp" data-wow-delay="100ms">
                    <a href="index.html" class="main-footer__logo">
                        <img src="assets/images/footer-logo.png" alt="nisoz" width="96" height="34">
                    </a><!-- /.footer-logo -->
                    <div class="main-footer__social">
                        <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    </div><!-- /.footer-social -->
                </div><!-- footer-top -->
                <div class="row">
                    <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="main-footer__navmenu">
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="team.html">Meet Our Team</a></li>
                                <li><a href="services.html">What We Offer</a></li>
                                <li><a href="blog-grid-right.html">Latest News</a></li>
                            </ul><!-- /.list-unstyled -->
                        </div><!-- /.footer-menu -->
                    </div>
                    <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="main-footer__navmenu">
                            <ul>
                                <li><a href="faq.html">Faqs</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="pricing.html">Pricing Plans</a></li>
                                <li><a href="portfolio.html">Recent Work</a></li>
                            </ul><!-- /.list-unstyled -->
                        </div><!-- /.footer-menu -->
                    </div>
                    <div class="col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="400ms">
                        <div class="main-footer__about">
                            <p class="main-footer__about__text">36 broklyn golden street. New<br> York. USA</p>
                            <ul class="main-footer__about__info">
                                <li><span class="fas fa-phone-square"></span><a href="tel:+923680006800">+92 (3680) 00 - 6800</a></li>
                                <li><span class="fas fa-envelope"></span><a href="mailto:needhelp@company.com">needhelp@company.com</a></li>
                            </ul>
                        </div><!-- /.footer-about -->
                    </div>
                    <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="500ms">
                        <div class="main-footer__newsletter">
                            <h5 class="main-footer__newsletter__text">Subscribe to get latest updates on daily basis</h5>
                            <form class="main-footer__email-box mc-form" data-url="MC_FORM_URL" novalidate="novalidate">
                                <div class="main-footer__email-input-box">
                                    <input type="email" placeholder="Email address" name="EMAIL">
                                </div>
                                <button type="submit" class="nisoz-btn">
                                    <span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span>
                                    <span class="nisoz-btn__text">Subscribe</span>
                                </button>
                            </form>
                            <div class="mc-form__response"></div>
                        </div><!-- /.footer-mailchimp -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /.main-footer -->

        <section class="copyright text-center">
            <div class="container wow fadeInUp" data-wow-delay="500ms">
                <p class="copyright__text">© Copyright <span class="dynamic-year"></span><!-- /.dynamic-year --> by <a href="index.html">Nisoz Template</a></p>
            </div><!-- /.container -->
        </section><!-- /.copyright -->

    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/logo-light.png" width="96" height="34" alt="nisoz" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:needhelp@company.com">needhelp@company.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+9236809850">+92 (3680) - 9850</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="nisoz-btn">
                    <span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span>
                    <span class="nisoz-btn__text"><i class="icon-magnifying-glass"></i></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <!-- back-to-top-start -->
    <a href="#" class="scroll-top">
        <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </a>
    <!-- back-to-top-end -->


    <script src="assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/odometer/odometer.min.js"></script>
    <script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/jquery-circleType/jquery.circleType.js"></script>
    <script src="assets/vendors/jquery-lettering/jquery.lettering.min.js"></script>
    <script src="assets/vendors/tilt/tilt.jquery.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <!-- template js -->
    <script src="assets/js/nisoz.js"></script>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>