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
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
        ]);

        $mainItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];

        $dropdownItems = [
            ['label' => '1) Запрос спортивных сооружений', 'url' => ['/structure/index']],
            ['label' => '2) Запрос спортсменов', 'url' => ['/sportsmens/index']],
            ['label' => '3) Запрос спортсменов для тренеров', 'url' => ['/sportsmen-treners/index']],
            ['label' => '4) Запрос спортсменов и колво видов спорта', 'url' => ['/sportsmen-vid-sporta/index']],
            ['label' => '5) Запрос тренеров для спортсменов', 'url' => ['/treners-sportsmens/index']],
            ['label' => '6) Запрос перечня соревнований', 'url' => ['/sorevnovaniya-org/index']],
            ['label' => '7) Запрос перечня призеров', 'url' => ['/prizer/index']],
            ['label' => '8) Запрос перечня соревнований и сооружений', 'url' => ['/sorevnovaniya-structure/index']],
            ['label' => '9) Запрос спортивных клубов и спортсменов', 'url' => ['/sport-club/index']],
            ['label' => '10) Запрос cписка тренеров по виду спорта', 'url' => ['/treners/index']],
            ['label' => '11) Запрос cписка спортсменов не участвовавших в соревах', 'url' => ['/sportsmen-sorevnovaniya/index']],
            ['label' => '12) Запрос cписка организаторов', 'url' => ['/org/index']],
            ['label' => '13) Запрос cписка структур', 'url' => ['/sport/index']],
        ];

        $dropdownItems2 = [
            ['label' => '1 laba - Sorev', 'url' => ['/sorevnovaniya/index']],
            ['label' => '3 laba - SorevCRUD', 'url' => ['/sorevnovaniya-c-r-u-d/index']],
        ];

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => array_merge($mainItems, [
                [
                    'label' => 'Запросы',
                    'items' => $dropdownItems,
                    'options' => ['class' => 'dropdown'],
                ],
                [
                    'label' => '1,3 лабы',
                    'items' => $dropdownItems2,
                    'options' => ['class' => 'dropdown'],
                ],
                Yii::$app->user->isGuest
                    ? ['label' => 'Login', 'url' => ['/site/login']]
                    : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
            ])
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
