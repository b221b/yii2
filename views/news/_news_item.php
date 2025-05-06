<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $model \app\models\Competitions
 */
?>
<div class="card h-100">
    <div class="card-body">
        <h3 class="card-title">
            <?= Html::a(Html::encode($model->name), ['competitions/view', 'id' => $model->id]) ?>
        </h3>

        <div class="news-meta mb-2">
            <span class="text-muted">
                <i class="far fa-calendar-alt"></i>
                <?= Yii::$app->formatter->asDate($model->event_date, 'php:d.m.Y') ?>
            </span>

            <span class="ml-3">
                <i class="fas fa-map-marker-alt"></i>
                <?= Html::encode($model->structure->name ?? '') ?>
            </span>
        </div>

        <div class="sport-badge mb-3">
            <span class="badge badge-primary">
                <?= Html::encode($model->kindOfSport->name ?? '') ?>
            </span>
        </div>

        <?php if ($model->description): ?>
            <div class="card-text mb-3">
                <?= nl2br(Html::encode($model->description)) ?>
            </div>
        <?php endif; ?>

        <?php if ($model->sportsmanPrizewinner): ?>
            <div class="prizewinners mt-auto">
                <h5>Призеры:</h5>
                <ul class="list-inline">
                    <?php foreach ($model->sportsmanPrizewinner as $prizer): ?>
                        <li class="list-inline-item">
                            <?= Html::encode($prizer->sportsman->name) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <div class="card-footer bg-transparent">
        <?= Html::a(
            'Подробнее',
            ['competitions/view', 'id' => $model->id],
            ['class' => 'btn btn-outline-primary']
        ) ?>
    </div>
</div>