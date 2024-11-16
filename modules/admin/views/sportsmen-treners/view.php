<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SportsmenTreners $model */

$this->title = $model->sportsmen->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортсмены & Тренеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sportsmen-treners-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id_sportsmen',
                'value' => function ($model) {
                    return $model->sportsmen ? $model->sportsmen->name : 'Не указано';
                },
            ],
            [
                'attribute' => 'id_treners',
                'value' => function ($model) {
                    return $model->treners ? $model->treners->name : 'Не указано';
                },
            ],
        ],
    ]) ?>

</div>