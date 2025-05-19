<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Перечень клубов и участников соревнований по периоду';
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
            <h2 class="section-title">Результаты</h2>
            <div class="results-count">
                <?php if ($dataProvider): ?>
                    Найдено: <?= count($dataProvider) ?> записей
                <?php else: ?>
                    Нет данных для отображения
                <?php endif; ?>
            </div>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="70%">Спортивный клуб</th>
                        <th width="30%">Количество спортсменов</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($dataProvider): ?>
                        <?php foreach ($dataProvider as $item): ?>
                            <tr class="clickable-row">
                                <td><?= Html::encode($item['club_name']) ?></td>
                                <td><?= Html::encode($item['athlete_count']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">Нет данных для отображения.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>