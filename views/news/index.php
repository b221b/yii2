<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Новости спортивных событий';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="intro-text mb-4">
        <p>Последние новости о спортивных событиях и соревнованиях. Будьте в курсе всех мероприятий и достижений спортсменов.</p>
    </div>

    <!-- Фильтры (аналогичные вашим, но для новостей) -->
    <div class="row mb-3">
        <div class="col-md-12 text-right">
            <button class="btn btn-primary" type="button" onclick="toggleFilters()">
                <i class="fas fa-filter"></i> Фильтры
            </button>
        </div>
    </div>

    <div class="collapse" id="filtersCollapse" style="display: none;">
        <div class="card card-body mb-3">
            <form method="get" action="<?= Yii::$app->urlManager->createUrl(['news/index']) ?>">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>По названию</label>
                            <input type="text" name="Competitions[name]" class="form-control"
                                value="<?= Html::encode($model->name ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Дата проведения</label>
                            <input type="date" name="Competitions[event_date]" class="form-control"
                                value="<?= Html::encode($model->event_date ?? '') ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Место проведения</label>
                            <select name="Competitions[id_structure]" class="form-control">
                                <option value="">Все места</option>
                                <?php foreach ($structures as $structure): ?>
                                    <option value="<?= $structure->id ?>"
                                        <?= ($model->id_structure == $structure->id) ? 'selected' : '' ?>>
                                        <?= Html::encode($structure->name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Вид спорта</label>
                            <select name="Competitions[id_kind_of_sport]" class="form-control">
                                <option value="">Все виды спорта</option>
                                <?php foreach ($kindsOfSport as $kind): ?>
                                    <option value="<?= $kind->id ?>"
                                        <?= ($model->id_kind_of_sport == $kind->id) ? 'selected' : '' ?>>
                                        <?= Html::encode($kind->name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">Применить</button>
                    <a href="<?= Yii::$app->urlManager->createUrl(['news/index']) ?>"
                        class="btn btn-outline-secondary">Сбросить</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Сетка новостей -->
    <!-- Сетка новостей -->
    <div class="row">
        <?php foreach ($competitions as $competition): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 position-relative overflow-hidden shadow-sm">
                    <!-- Фоновое изображение -->
                    <div class="card-background"
                        style="background-image: url('https://source.unsplash.com/random/600x400/?<?= Html::encode(str_replace(' ', '', $competition->kindOfSport->name ?? 'sport')) ?>,<?= rand(1, 100) ?>');">
                    </div>

                    <!-- Затемнение фона только при наведении -->
                    <div class="card-overlay"></div>

                    <div class="card-body position-relative d-flex flex-column">
                        <!-- Заголовок с контрастным фоном -->
                        <h3 class="card-title">
                            <span class="title-bg px-2 py-1">
                                <?= Html::a(
                                    Html::encode($competition->name),
                                    ['news/view', 'id' => $competition->id],
                                    ['class' => 'stretched-link text-dark']
                                ) ?>
                            </span>
                        </h3>

                        <div class="news-meta mb-2">
                            <span class="meta-item bg-light px-2 py-1 mr-2">
                                <i class="far fa-calendar-alt text-primary"></i>
                                <?= Yii::$app->formatter->asDate($competition->event_date, 'php:d.m.Y') ?>
                            </span>

                            <span class="meta-item bg-light px-2 py-1">
                                <i class="fas fa-map-marker-alt text-danger"></i>
                                <?= Html::encode($competition->structure->name ?? '') ?>
                            </span>
                        </div>

                        <!-- Бейдж вида спорта -->
                        <div class="sport-badge mb-3">
                            <span class="badge bg-warning text-dark">
                                <?= Html::encode($competition->kindOfSport->name ?? '') ?>
                            </span>
                        </div>

                        <!-- Описание на полупрозрачном фоне -->
                        <?php if ($competition->description): ?>
                            <div class="card-text mb-3 p-2 description-bg">
                                <?= nl2br(Html::encode(mb_substr($competition->description, 0, 150) . '...')) ?>
                            </div>
                        <?php endif; ?>

                        <!-- Футер карточки -->
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded">
                                <span class="text-muted">
                                    <i class="fas fa-trophy text-warning"></i>
                                    <?= count($competition->sportsmanPrizewinner) ?> призеров
                                </span>
                                <?= Html::a(
                                    'Подробнее →',
                                    ['news/view', 'id' => $competition->id],
                                    ['class' => 'btn btn-sm btn-primary']
                                ) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Пагинация -->
    <?= LinkPager::widget([
        'pagination' => $pagination,
        'options' => ['class' => 'pagination justify-content-center'],
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
    ]); ?>
</div>

<script>
    function toggleFilters() {
        var filters = document.getElementById('filtersCollapse');
        filters.style.display = filters.style.display === 'none' ? 'block' : 'none';
    }
</script>

<style>
    .news-index .card {
        transition: all 0.3s ease;
        height: 100%;
        border: none;
        border-radius: 8px;
        overflow: hidden;
    }

    .news-index .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-size: cover;
        background-position: center;
        transition: transform 0.5s ease;
        z-index: 1;
    }

    .card:hover .card-background {
        transform: scale(1.05);
    }

    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0);
        transition: background 0.3s ease;
        z-index: 2;
    }

    .card:hover .card-overlay {
        background: rgba(0, 0, 0, 0.3);
    }

    .card-body {
        position: relative;
        z-index: 3;
    }

    .title-bg {
        background-color: rgba(255, 255, 255, 0.9);
        display: inline-block;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .card:hover .title-bg {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .news-meta {
        font-size: 0.9rem;
    }

    .meta-item {
        border-radius: 4px;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .card:hover .meta-item {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .sport-badge .badge {
        font-size: 0.8rem;
        padding: 0.35em 0.65em;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .description-bg {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .card:hover .description-bg {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
</style>