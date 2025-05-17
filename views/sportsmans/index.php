<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\Sportsman;
use app\models\KindOfSport;
use yii\helpers\Url;

$this->title = 'Список спортсменов по видам спорта';
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
                    <?= $form->field($model, 'discharge')->textInput([
                        'type' => 'number',
                        'placeholder' => 'Введите разряд',
                        'class' => 'form-control filter-input'
                    ]) ?>
                </div>

                <div class="filter-col">
                    <?= $form->field($model, 'id_kind_of_sport')->dropDownList(
                        \yii\helpers\ArrayHelper::map($vidSportaList, 'id', 'name'),
                        [
                            'prompt' => 'Выберите вид спорта',
                            'class' => 'form-control filter-select'
                        ]
                    ) ?>
                </div>

                <div class="filter-col filter-buttons">
                    <?= Html::submitButton('<i class="fas fa-search"></i> Поиск', [
                        'class' => 'btn btn-primary filter-btn'
                    ]) ?>
                    <?= Html::a('<i class="fas fa-broom"></i> Сбросить', ['index'], [
                        'class' => 'btn btn-outline-secondary filter-btn'
                    ]) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="results-container">
        <div class="results-header">
            <h2 class="section-title">Список спортсменов</h2>
            <div class="results-count">
                Найдено: <?= $dataProvider->getTotalCount() ?> записей
            </div>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="40%">Имя</th>
                        <th width="20%">Разряд</th>
                        <th width="40%">Вид спорта</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataProvider->models as $sportsman): ?>
                        <tr class="clickable-row" onclick="window.location.href='<?= Url::to(['/site/view-record', 'table' => 'sportsman', 'id' => $sportsman->id]) ?>'">
                            <td><?= Html::encode($sportsman->name) ?></td>
                            <td><?= Html::encode($sportsman->discharge) ?></td>
                            <td>
                                <?php
                                $vidSportaNames = [];
                                foreach ($sportsman->sportsmanKindOfSport as $relation) {
                                    $vidSportaNames[] = $relation->kindOfSport->name;
                                }
                                echo Html::encode(implode(', ', $vidSportaNames));
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?= \yii\widgets\LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'options' => ['class' => 'pagination'],
            'linkOptions' => ['class' => 'page-link'],
            'activePageCssClass' => 'active',
            'disabledPageCssClass' => 'disabled',
        ]); ?>
    </div>
</div>