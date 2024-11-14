<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Соревнования CRUD';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Создать Соревнование', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'id',
            'label' => 'ID',
        ],
        'name',
        'data_provedeniya',
        [
            'attribute' => 'structure.name',
            'label' => 'Структура',
        ],
        [
            'attribute' => 'vidSporta.name',
            'label' => 'Вид спорта',
        ],
        [
            'label' => 'Призеры',
            'value' => function ($model) {
                $prizers = $model->sportsmenPrizers; // Получаем всех призеров
                return $prizers ? implode(', ', array_map(fn($prizer) => $prizer->sportsmen->name, $prizers)) : '-';
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия',
            'template' => '{view} {update} {delete}',
        ],
    ],
]); ?>