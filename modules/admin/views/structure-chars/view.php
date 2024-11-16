<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\StructureChars $model */

$this->title = $model->structure->name;
$this->params['breadcrumbs'][] = ['label' => 'Таблица Характеристики Структур', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="structure-chars-view">

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
                'attribute' => 'id_structure',
                'value' => function ($models) {
                    return $models->structure ? $models->structure->name : 'не указано';
                },
            ],
            'vmestimost',
            'tip_pokritiya',
            'kolvo_oborydovaniya',
            'kolvo_tribun',
        ],
    ]) ?>

</div>