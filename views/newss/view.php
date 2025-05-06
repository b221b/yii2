<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="event-date">
        <strong><i class="fas fa-calendar-alt"></i> Дата проведения:</strong>
        <?= Yii::$app->formatter->asDate($model->event_date) ?>
    </div>

    <div class="event-sport">
        <strong><i class="fas fa-trophy"></i> Вид спорта:</strong>
        <?= Html::encode($model->sport->name ?? '') ?>
    </div>

    <div class="event-description">
        <h3>Описание:</h3>
        <?= Html::encode($model->description) ?>
    </div>

    <div class="event-organisations">
        <h3><i class="fas fa-building"></i> Организаторы:</h3>
        <ul>
            <?php foreach ($model->organisations as $org): ?>
                <li><?= Html::encode($org->full_name) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="event-winners">
        <h3><i class="fas fa-medal"></i> Победители:</h3>
        <?php if ($model->winners): ?>
            <ul>
                <?php foreach ($model->winners as $winner): ?>
                    <li><?= Html::encode($winner->name) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Информация о победителях пока недоступна.</p>
        <?php endif; ?>
    </div>

    <?= Html::a('Назад к списку', ['index'], ['class' => 'btn btn-default']) ?>
</div>