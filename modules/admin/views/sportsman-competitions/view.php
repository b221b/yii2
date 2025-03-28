<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SportsmenSorevnovaniya $model */

$this->title = $model->sportsman->name . ' & ' . $model->competitions->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Спортсмены & Соревнования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sportsmen-sorevnovaniya-view">

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
                'attribute' => 'id_sportsman',
                'value' => function ($model) {
                    return $model->sportsman ? $model->sportsman->name : 'Не указано';
                },
            ],
            [
                'attribute' => 'id_competitions',
                'value' => function ($model) {
                    return $model->competitions ? $model->competitions->name : 'Не указано';
                },
            ],
        ],
    ]) ?>

</div>