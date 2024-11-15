<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Treners $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Тренеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="treners-view">

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
            'name',
            [
                'attribute' => 'id_vid_sporta', // Указываем атрибут
                'value' => function ($model) {
                    return $model->vidSporta ? $model->vidSporta->name : 'Не указано'; // Проверяем наличие связи и выводим имя вида спорта
                },
            ],
        ],
    ]) ?>

</div>