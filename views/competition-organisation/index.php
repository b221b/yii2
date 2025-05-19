<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Перечень соревнований по периоду и организатору';
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
                    <?= $form->field($model, 'startDate')->input('date', [
                        'class' => 'form-control filter-input'
                    ]) ?>
                </div>

                <div class="filter-col">
                    <?= $form->field($model, 'endDate')->input('date', [
                        'class' => 'form-control filter-input'
                    ]) ?>
                </div>

                <div class="filter-col">
                    <?= $form->field($model, 'full_name')->dropDownList(
                        $orgs,
                        [
                            'prompt' => 'Выберите организатора',
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
            <h2 class="section-title">Результаты поиска</h2>
            <div class="results-count">
                Найдено: <?= $dataProvider->getTotalCount() ?> записей
            </div>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="40%">Название соревнования</th>
                        <th width="30%">Дата проведения</th>
                        <th width="30%">Организатор</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataProvider->models as $competitions): ?>
                        <tr class="clickable-row">
                            <td><?= Html::encode($competitions->name) ?></td>
                            <td><?= Html::encode(Yii::$app->formatter->asDate($competitions->event_date, 'php:d-m-Y')) ?></td>
                            <td><?= Html::encode($competitions->organisationsCompetitions[0]->organisations->full_name ?? 'Не указано') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'options' => ['class' => 'pagination'],
            'linkOptions' => ['class' => 'page-link'],
            'activePageCssClass' => 'active',
            'disabledPageCssClass' => 'disabled',
        ]); ?>
    </div>
</div>