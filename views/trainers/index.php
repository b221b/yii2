<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Список тренеров по виду спорта';
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
                    <?= $form->field($model, 'sport')->dropDownList(
                        $sports,
                        [
                            'prompt' => 'Выберите вид спорта',
                            'class' => 'form-control filter-select'
                        ]
                    ) ?>
                </div>

                <div class="filter-col filter-buttons">
                    <?= Html::submitButton('<i class="fas fa-search"></i> Получить тренеров', [
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
                Найдено: <?= count($dataProvider) ?> записей
            </div>
        </div>

        <?= GridView::widget([
            'dataProvider' => new \yii\data\ArrayDataProvider([
                'allModels' => $dataProvider,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]),
            'tableOptions' => ['class' => 'data-table'],
            'headerRowOptions' => ['class' => 'table-header'],
            'rowOptions' => function ($model) {
                return [
                    'class' => 'clickable-row',
                ];
            },
            'columns' => [
                [
                    'attribute' => 'trainer_name',
                    'headerOptions' => ['width' => '60%'],
                    'contentOptions' => ['class' => ''],
                    'label' => 'Тренер',
                ],
                [
                    'attribute' => 'sport_name',
                    'headerOptions' => ['width' => '35%'],
                    'label' => 'Вид спорта',
                    'value' => function ($model) {
                        return $model['sport_name'] ?? 'Не указано';
                    },
                    'contentOptions' => ['class' => ''],
                ],
            ],
            'pager' => [
                'options' => ['class' => 'pagination'],
                'linkOptions' => ['class' => 'page-link'],
                'activePageCssClass' => 'active',
                'disabledPageCssClass' => 'disabled',
            ],
        ]); ?>
    </div>
</div>