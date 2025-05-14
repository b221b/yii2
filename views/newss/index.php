<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-page">
    <!-- Hero-баннер -->
    <div class="news-header">
        <div class="container">
            <h1><?= Html::encode($this->title) ?></h1>
            <p class="lead">Самые свежие новости из мира спорта</p>
        </div>
    </div>

    <div class="container news-container">
        <!-- Основной контент -->
        <div class="row">
            <!-- Боковая панель -->
            <aside class="col-lg-3 sidebar">
                <!-- Виджет последних новостей -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Последние новости</h3>
                    <?= \app\widgets\LastNewsWidget::widget() ?>
                </div>

                <!-- Фильтр по видам спорта -->
                <div class="sidebar-widget sport-filter">
                    <h3 class="widget-title">Виды спорта</h3>
                    <ul class="sport-list">
                        <li><?= Html::a('Все новости', ['index'], ['class' => 'active']) ?></li>
                        <?php foreach ($sports as $sport): ?>
                            <li><?= Html::a($sport->name, ['index', 'sport' => $sport->id]) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Баннер или реклама -->
                <div class="sidebar-widget promo-banner">
                    <img src="https://photosota.club/uploads/posts/2023-07/1689502880_photosota-club-p-beg-shkolnikov-21.jpg" alt="Спортивные события" class="img-fluid">
                    <div class="promo-text">Подпишитесь на наши новости</div>
                </div>
            </aside>

            <!-- Основная новостная лента -->
            <main class="col-lg-9 news-feed">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_item',
                    'layout' => "{items}\n{pager}",
                    'options' => ['class' => 'news-list'],
                    'itemOptions' => ['class' => 'news-item'],
                    'pager' => [
                        'options' => ['class' => 'news-pager'],
                        'prevPageLabel' => '<i class="fas fa-chevron-left"></i>',
                        'nextPageLabel' => '<i class="fas fa-chevron-right"></i>',
                        'maxButtonCount' => 5,
                    ]
                ]); ?>
            </main>
        </div>
    </div>
</div>