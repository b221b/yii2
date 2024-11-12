<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Соревнования';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="../../web/css/sorev.css">

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Создать Соревнование', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'id', // Убедитесь, что 'id' существует в модели Sorevnovaniya
            'label' => 'ID', // Заголовок столбца
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
            'label' => 'Призер',
            'value' => function($model) {
                $sportsmen = $model->getSportsmenSorevnovaniyas()->one();
                return $sportsmen ? $sportsmen->sportsmen->name : '-';
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'view' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                        'title' => 'Просмотр',
                    ]);
                },
                'update' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                        'title' => 'Изменить',
                    ]);
                },
                'delete' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => 'Удалить',
                        'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                        'data-method' => 'post',
                    ]);
                },
            ],
        ],
    ],
]); ?>
