<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <div class="card-body">
            <div class="news-meta mb-4">
                <span class="text-muted mr-3">
                    <i class="far fa-calendar-alt"></i>
                    <?= Yii::$app->formatter->asDate($model->event_date, 'php:d.m.Y') ?>
                </span>

                <span class="text-muted mr-3">
                    <i class="fas fa-map-marker-alt"></i>
                    <?= Html::encode($model->structure->name ?? '') ?>
                </span>

                <span class="badge badge-primary">
                    <?= Html::encode($model->kindOfSport->name ?? '') ?>
                </span>
            </div>

            <?php if ($model->description): ?>
                <div class="news-content mb-4">
                    <?= nl2br(Html::encode($model->description)) ?>
                </div>
            <?php endif; ?>

            <?php if ($model->sportsmanPrizewinner): ?>
                <div class="prizewinners mt-4">
                    <h3>Призеры:</h3>
                    <ul class="list-group">
                        <?php foreach ($model->sportsmanPrizewinner as $prizer): ?>
                            <li class="list-group-item">
                                <?= Html::encode($prizer->sportsman->name) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .news-view .card {
        border: none;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .news-meta {
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .news-content {
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .prizewinners h3 {
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .list-group-item {
        border-left: none;
        border-right: none;
    }
</style>