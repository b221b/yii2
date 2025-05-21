<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $events app\models\Competitions[] */
/* @var $userRegisteredCompetitions array */
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
                    'template' => '{apply}',
                    'buttons' => [
                        'apply' => function ($url, $model) use ($userRegisteredCompetitions) {
                            // Проверяем, зарегистрирован ли уже пользователь
                            if (in_array($model->id, $userRegisteredCompetitions)) {
                                return Html::tag('span', 'Вы уже зарегистрированы', [
                                    'class' => 'btn-registered',
                                    'style' => 'color: green;'
                                ]);
                            }

                            return Html::a(
                                '<i class="fas fa-user-plus"></i> Подать заявку',
                                ['competition-applications/create', 'competition_id' => $model->id],
                                [
                                    'class' => 'btn-apply',
                                    'data' => [
                                        'confirm' => 'Вы уверены, что хотите подать заявку на это соревнование?',
                                        'method' => 'post',
                                    ]
                                ]
                            );
                        },
                    ],
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell action-cell'],
                    'visible' => $showRegisterButton && !\Yii::$app->user->isGuest,
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