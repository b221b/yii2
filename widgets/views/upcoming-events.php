<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $events app\models\Competitions[] */

?>

<div class="sorevnovaniya-index">

    <h1><?= Html::encode("Предстоящие соревнования") ?></h1>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $events,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]),
        'filterModel' => null,
        'columns' => [
            [
                'attribute' => 'name',
                'label' => 'Название',
            ],
            [
                'attribute' => 'event_date',
                'label' => 'Дата',
                'format' => ['date', 'php:Y-m-d'],
            ],
            [
                'attribute' => 'id_structure',
                'label' => 'Место проведения',
                'value' => function ($model) {
                    return $model->structure ? $model->structure->name : 'Не указано';
                },
            ],
            [
                'attribute' => 'id_kind_of_sport',
                'label' => 'Вид спорта',
                'value' => function ($model) {
                    return $model->kindOfSport ? $model->kindOfSport->name : 'Не указано';
                },
            ],
            // [
            //     'class' => 'yii\grid\ActionColumn', // Столбец действий (редактирование, удаление и т.д.)
            //     'header' => 'Действия',
            // ],
        ],
    ]); ?>
</div>