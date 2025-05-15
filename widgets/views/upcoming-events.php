<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $events app\models\Competitions[] */
?>

<div class="competitions-widget">

    <div class="section-header">
        <h1 class="section-title"><?= Html::encode("Предстоящие соревнования") ?></h1>
        <div class="section-line"></div>
    </div>

    <div class="competitions-container">
        <?= GridView::widget([
            'dataProvider' => new \yii\data\ArrayDataProvider([
                'allModels' => $events,
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]),
            'tableOptions' => ['class' => 'table competitions-table'],
            'filterModel' => null,
            'layout' => "{items}\n{pager}",
            'columns' => [
                [
                    'attribute' => 'name',
                    'label' => 'Название',
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell'],
                ],
                [
                    'attribute' => 'event_date',
                    'label' => 'Дата',
                    'format' => ['date', 'php:Y-m-d'],
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell'],
                ],
                [
                    'attribute' => 'id_structure',
                    'label' => 'Место проведения',
                    'value' => function ($model) {
                        return $model->structure ? $model->structure->name : 'Не указано';
                    },
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell'],
                ],
                [
                    'attribute' => 'id_kind_of_sport',
                    'label' => 'Вид спорта',
                    'value' => function ($model) {
                        return $model->kindOfSport ? $model->kindOfSport->name : 'Не указано';
                    },
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell'],
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{register}',
                    'buttons' => [
                        'register' => function ($url, $model) {
                            return Html::a(
                                '<i class="fas fa-user-plus"></i> Записаться',
                                ['competitions/register', 'id' => $model->id],
                                [
                                    'class' => 'btn-register',
                                    'data' => [
                                        'confirm' => 'Вы уверены, что хотите записаться на это соревнование?',
                                        'method' => 'post',
                                    ]
                                ]
                            );
                        },
                    ],
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell action-cell'],
                ],
            ],
            'pager' => [
                'options' => ['class' => 'pagination-list'],
                'linkOptions' => ['class' => 'pagination-link'],
                'activePageCssClass' => 'pagination-active',
                'disabledPageCssClass' => 'pagination-disabled',
                'prevPageLabel' => '<i class="fas fa-chevron-left"></i>',
                'nextPageLabel' => '<i class="fas fa-chevron-right"></i>',
            ],
        ]); ?>
    </div>
</div>

<style>
    
</style>