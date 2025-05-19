<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Список спортсменов не участвовавших в соревнованиях';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="data-container">
    <div class="filter-container">
        <h1 class="data-title"><?= Html::encode($this->title) ?></h1>

        <div class="filter-card">
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'filter-form'],
                'fieldConfig' => [
                    'options' => ['class' => 'filter-field'],
                    'template' => "{label}\n{input}\n{error}",
                ],
            ]); ?>

            <div class="filter-row">
                <div class="filter-col">
                    <?= $form->field($model, 'start_date')->input('date', [
                        'class' => 'form-control filter-input'
                    ]) ?>
                </div>

                <div class="filter-col">
                    <?= $form->field($model, 'end_date')->input('date', [
                        'class' => 'form-control filter-input'
                    ]) ?>
                </div>

                <div class="filter-col filter-buttons">
                    <?= Html::submitButton('<i class="fas fa-search"></i> Получить спортсменов', [
                        'class' => 'btn btn-primary filter-btn'
                    ]) ?>
                    <?= Html::a('<i class="fas fa-broom"></i> Получить все записи', ['index'], [
                        'class' => 'btn btn-outline-secondary filter-btn'
                    ]) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="results-container">
        <div class="results-header">
            <h2 class="section-title">Результаты</h2>
            <div class="results-count">
                <?php if (is_array($dataProvider)): ?>
                    Найдено: <?= count($dataProvider) ?> записей
                <?php else: ?>
                    Нет данных для отображения
                <?php endif; ?>
            </div>
        </div>

        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-container">
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
        <?php endif; ?>

        <?= GridView::widget([
            'dataProvider' => new \yii\data\ArrayDataProvider([
                'allModels' => $dataProvider,
                'pagination' => false,
            ]),
            'tableOptions' => ['class' => 'data-table'],
            'headerRowOptions' => ['class' => 'table-header'],
            'rowOptions' => function ($model) {
                return [
                    'class' => 'clickable-row',
                    'onclick' => "window.location.href='" . Url::to(['/site/view-record', 'table' => 'sportsman', 'id' => $model['id'] ?? null]) . "'"
                ];
            },
            'columns' => [
                [
                    'attribute' => 'name',
                    'headerOptions' => ['width' => '90%'],
                    'contentOptions' => ['class' => ''],
                    'label' => 'Имя спортсмена'
                ],
            ],
            'emptyText' => 'Нет данных для отображения',
            'emptyTextOptions' => ['class' => 'empty-text'],
        ]); ?>
    </div>
</div>