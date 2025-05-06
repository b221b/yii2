<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="news-item">
    <h3><?= Html::a(Html::encode($model->name), ['view', 'id' => $model->id]) ?></h3>

    <div class="meta">
        <span class="date"><?= Yii::$app->formatter->asDate($model->event_date) ?></span>
        <span class="sport"><?= Html::encode($model->sport->name ?? '') ?></span>
    </div>

    <div class="description">
        <?= Html::encode($model->description) ?>
    </div>

    <div class="organisations">
        <strong>Организаторы:</strong>
        <?php foreach ($model->organisations as $org): ?>
            <span><?= Html::encode($org->full_name) ?></span>
        <?php endforeach; ?>
    </div>

    <?= Html::a('Подробнее', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</div>