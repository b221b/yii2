<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Соревнования CRUD';
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
            'value' => function ($model) {
                $sportsmen = $model->getSportsmenSorevnovaniyas()->one();
                return $sportsmen ? $sportsmen->sportsmen->name : '-';
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                // 'view' => function ($url) {
                //     return Html::a('Просмотр', $url, [
                //         'class' => 'btn btn-success', 
                //         'title' => 'Просмотр',
                //         'aria-label' => 'Просмотр',
                //         'data-pjax' => '0', 
                //     ]);
                // },
                // 'update' => function ($url) {
                //     return Html::a('Изменить', $url, [
                //         'class' => 'btn btn-warning', 
                //         'title' => 'Изменить',
                //         'aria-label' => 'Изменить',
                //         'data-pjax' => '0', 
                //     ]);
                // },
                // 'delete' => function ($url) {
                //     return Html::a('Удалить', $url, [
                //         'class' => 'btn btn-danger', 
                //         'title' => 'Удалить',
                //         'aria-label' => 'Удалить',
                // 'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                //         'data-method' => 'post',
                //         'data-pjax' => '0', 
                // ]);
                // },
            ],
        ],
    ],
]); ?>