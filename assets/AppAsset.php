<?php

/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/vendors/bootstrap/css/bootstrap.min.css',
        'assets/vendors/bootstrap-select/bootstrap-select.min.css',
        'assets/vendors/jquery-ui/jquery-ui.css',
        'assets/vendors/animate/animate.min.css',
        'assets/vendors/fontawesome/css/all.min.css',
        'assets/vendors/nisoz-icons/style.css',
        'assets/vendors/jarallax/jarallax.css',
        'assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css',
        'assets/vendors/nouislider/nouislider.min.css',
        'assets/vendors/nouislider/nouislider.pips.css',
        'assets/vendors/odometer/odometer.min.css',
        'assets/vendors/tiny-slider/tiny-slider.min.css',
        'assets/vendors/owl-carousel/assets/owl.carousel.min.css',
        'assets/vendors/owl-carousel/assets/owl.theme.default.min.css',
        'assets/css/nisoz.css',

        'css/about.css',
        'css/cards.css',
        'css/logo.css',
        'css/searchTable.css',
        'css/competitions.css',
        'css/newss.css',
        'css/user_details.css',
        'css/site.css',
        'css/upcoming-events.css',

    ];
    public $js = [
        'js/site.js',

        'assets/vendors/jquery/jquery-3.5.1.min.js',
        'assets/vendors/bootstrap-select/bootstrap-select.min.js',
        'assets/vendors/jquery-ui/jquery-ui.js',
        'assets/vendors/jarallax/jarallax.min.js',
        'assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js',
        'assets/vendors/jquery-appear/jquery.appear.min.js',
        'assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js',
        'assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js',
        'assets/vendors/jquery-validate/jquery.validate.min.js',
        'assets/vendors/nouislider/nouislider.min.js',
        'assets/vendors/odometer/odometer.min.js',
        'assets/vendors/tiny-slider/tiny-slider.min.js',
        'assets/vendors/owl-carousel/owl.carousel.min.js',
        'assets/vendors/wnumb/wNumb.min.js',
        'assets/vendors/jquery-circleType/jquery.circleType.js',
        'assets/vendors/jquery-lettering/jquery.lettering.min.js',
        'assets/vendors/tilt/tilt.jquery.js',
        'assets/vendors/wow/wow.js',
        'assets/vendors/isotope/isotope.js',
        'assets/vendors/countdown/countdown.min.js',
        'assets/js/nisoz.js',

        'js/searchTable.js',
        'js/competitions.js',
        'js/user_profile.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
