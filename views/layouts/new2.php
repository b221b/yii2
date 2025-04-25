<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Nisoz HTML Template For Creative Agency']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

// Фавиконы
$this->registerLinkTag(['rel' => 'apple-touch-icon', 'sizes' => '180x180', 'href' => 'assets/images/favicons/apple-touch-icon.png']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'sizes' => '16x16', 'href' => 'assets/images/favicons/favicon-16x16.png']);
$this->registerLinkTag(['rel' => 'manifest', 'href' => 'assets/images/favicons/site.webmanifest']);
$this->registerLinkTag([
    'rel' => 'icon',
    'type' => 'image/png',
    'sizes' => '32x32',
    'href' => Url::to('@web/assets/images/favicons/favicon-32x32.png')
]);

// Шрифты
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.googleapis.com']);
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'true']);
$this->registerLinkTag(['rel' => 'stylesheet', 'href' => 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Manrope:wght@300;400;500;600;700;800&display=swap']);

$this->registerJsFile('@web/js/yii.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile('@web/js/searchTable.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="custom-cursor">
    <?php $this->beginBody() ?>

    <!-- что бы включить курсоры, надо перейти в файл web\assets\js\nisoz.js на 426 строку и раскомментировать блок custom cursor -->
    <!-- <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div> -->

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
                        <li><a href="<?= Url::to(['site/index']) ?>">Home</a></li>
                        <li><a href="<?= Url::to(['site/about']) ?>">About</a></li>
                        <li><a href="<?= Url::to(['site/contact']) ?>">Contact</a></li>

                        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin == 1): ?>
                            <li><a href="<?= Url::to(['/admin']) ?>">Admin</a></li>
                        <?php endif; ?>

                        <!-- <li><a href="<?= Url::to(['site/contact1']) ?>">404</a></li> -->
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
                    'class' => 'main-menu navbar-expand fixed-top',
                ],
            ]);
            ?>

            <div class="container-fluid d-flex align-items-center">
                <!-- Логотип слева с отступом -->
                <div class="main-menu__logo me-4">
                    <a href="<?= Yii::$app->homeUrl ?>" class="logo">
                        SportOrg
                    </a>
                </div>

                <!-- Поиск по центру с flex-grow -->
                <div class="flex-grow-1 mx-4" style="max-width: 600px;">
                    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                        <?= \app\widgets\TableSearchWidget::widget() ?>
                    </div>
                </div>

                <!-- Навигация справа с запретом переноса -->
                <div class="main-menu__nav">
                    <?= Nav::widget([
                        'options' => [
                            'class' => 'main-menu__list flex-row', //navbar-nav
                            'style' => 'flex-wrap: nowrap;'
                        ],
                        'dropdownClass' => \yii\bootstrap5\Dropdown::class,
                        'items' => [
                            [
                                'label' => 'Соревнования',
                                'url' => ['/competitions/index'],
                                'linkOptions' => ['class' => 'nav-link mx-1']
                            ],

                            Yii::$app->user->isGuest
                                ? [
                                    'label' => 'Профиль',
                                    'url' => ['/site/login'],
                                    'linkOptions' => ['class' => 'nav-link mx-1']
                                ]
                                : [
                                    'label' => 'Профиль',
                                    'url' => ['/user/index'],
                                    'linkOptions' => ['class' => 'nav-link mx-1']
                                ],

                            Yii::$app->user->isGuest
                                ? [
                                    'label' => 'Войти',
                                    'url' => ['/site/login'],
                                    'linkOptions' => ['class' => 'nav-link mx-1']
                                ]
                                : [
                                    'label' => '<span class="nav-link-text">Выйти (' . Yii::$app->user->identity->username . ')</span>',
                                    'url' => '#',
                                    'encode' => false,
                                    'linkOptions' => [
                                        'class' => 'nav-link mx-1',
                                        'onclick' => 'event.preventDefault(); document.getElementById(\'logout-form\').submit();'
                                    ]
                                ],
                            '<li class="d-none">'
                                . Html::beginForm(['/site/logout'], 'post', ['id' => 'logout-form'])
                                . Html::csrfMetaTags()
                                . Html::endForm()
                                . '</li>'
                        ],
                    ]); ?>
                </div>

                <!-- Мобильное меню -->
                <div class="main-menu__right ms-2">
                    <a href="#" class="main-menu__toggler mobile-nav__toggler">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>

            <?php NavBar::end(); ?>
        </header>

        <section class="page-header">
            <div class="page-header__bg"></div>
            <div class="page-header__shape1"></div>
            <!-- <div class="page-header__shape2"></div> -->
            <!-- <div class="page-header__shape3 wow slideInRight animated" data-wow-delay="300ms"></div> -->
            <div class="container">
                <?php if (!empty($this->params['breadcrumbs'])): ?>
                    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                <?php endif ?>
                <?= Alert::widget() ?>

                <h2 class="page-header__title">
                    <?= Html::encode($this->title) ?>
                </h2><!-- /.page-title -->

            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <!-- Контент Start -->
        <main id="main" class="flex-shrink-0" role="main">
            <div class="container">
                <?= $content ?>
            </div>
        </main>
        <!-- Контент End -->

        <footer class="main-footer">
            <div class="main-footer__bg" style="background-image: url(assets/images/shapes/footer-bg-1.png);"></div>
            <div class="container">
                <div class="main-footer__top wow fadeInUp" data-wow-delay="100ms">
                    <a href="<?= Yii::$app->homeUrl ?>" class="logo">
                        SportOrg
                    </a>
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
                <a href="<?= Yii::$app->homeUrl ?>" class="main-menu__logo">
                    <img src="<?= Url::to('@web/assets/images/logo-light3.png') ?>" alt="nisoz" width="70">
                </a>
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

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>