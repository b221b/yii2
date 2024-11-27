<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <!-- <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p> -->

    <!-- Error Start -->
    <section class="error-page">
        <div class="container">
            <div class="error-page__content">
                <div class="error-page__404"><img src="assets/images/shapes/404.png" alt="nisoz"></div><!-- 404-image -->
                <div class="error-page__shape1 wow slideInDown" data-wow-delay="300ms"><img src="assets/images/shapes/404-shape-1.png" alt="nisoz"></div><!-- 404-image -->
                <div class="error-page__shape2 wow slideInUp" data-wow-delay="400ms"><img src="assets/images/shapes/404-shape-2.png" alt="nisoz"></div><!-- 404-image -->
                <h4 class="error-page__title">Oops! page not found</h4><!-- 404-title -->
                <p class="error-page__text">The page you are looking for is not exist.</p><!-- 404-content -->
                <form class="error-page__form">
                    

                </form><!-- 404-search-form -->
                <a href="index.html" class="nisoz-btn">
                    <span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span><span class="nisoz-btn__shape"></span>
                    <span class="nisoz-btn__text">Back to Home</span>
                </a><!-- 404-btn -->
                
            </div><!-- 404-info -->
        </div>
    </section>
    <!-- Error End -->

</div>