<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $applications app\models\CompetitionApplications[] */
?>

<div class="applications-widget">
    <div class="section-header">
        <h1 class="section-title"><?= Html::encode("Заявки на соревнования") ?></h1>
        <div class="section-line"></div>
    </div>

    <div class="applications-container">
        <?= GridView::widget([
            'dataProvider' => new \yii\data\ArrayDataProvider([
                'allModels' => $applications,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]),
            'tableOptions' => ['class' => 'table applications-table'],
            'filterModel' => null,
            'layout' => "{items}\n{pager}",
            'columns' => [
                [
                    'attribute' => 'user.username',
                    'label' => 'Пользователь',
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell'],
                ],
                [
                    'attribute' => 'competition.name',
                    'label' => 'Соревнование',
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell'],
                ],
                [
                    'attribute' => 'created_at',
                    'label' => 'Дата подачи',
                    'format' => ['date', 'php:Y-m-d H:i'],
                    'headerOptions' => ['class' => 'table-header'],
                    'contentOptions' => ['class' => 'table-cell'],
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{approve} {reject}',
                    'buttons' => [
                        'approve' => function ($url, $model) {
                            return Html::a(
                                '<i class="fas fa-check"></i> Одобрить',
                                ['competition-applications/approve', 'id' => $model->id],
                                [
                                    'class' => 'btn btn-success',
                                    'data' => [
                                        'confirm' => 'Вы уверены, что хотите одобрить эту заявку?',
                                        'method' => 'post',
                                    ]
                                ]
                            );
                        },
                        'reject' => function ($url, $model) {
                            return Html::a(
                                '<i class="fas fa-times"></i> Отклонить',
                                ['competition-applications/reject', 'id' => $model->id],
                                [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Вы уверены, что хотите отклонить эту заявку?',
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