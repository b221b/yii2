<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Тренеры и их подопечные';
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
                    <?= $form->field($model, 'trener_id')->dropDownList(
                        $trenerOptions,
                        [
                            'prompt' => 'Выберите тренера',
                            'class' => 'form-control filter-select'
                        ]
                    ) ?>
                </div>

                <div class="filter-col">
                    <?= $form->field($model, 'discharge')->textInput([
                        'type' => 'number',
                        'placeholder' => 'Введите разряд',
                        'class' => 'form-control filter-input'
                    ]) ?>
                </div>

                <div class="filter-col filter-buttons">
                    <?= Html::submitButton('<i class="fas fa-search"></i> Поиск', [
                        'class' => 'btn btn-primary filter-btn'
                    ]) ?>
                    <?= Html::a('<i class="fas fa-broom"></i> Показать всех', ['index'], [
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

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="60%">Имя спортсмена</th>
                        <th width="40%">Разряд</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataProvider as $sportsman): ?>
                        <tr class="clickable-row" onclick="window.location.href='<?= Url::to(['/site/view-record', 'table' => 'sportsman', 'id' => $sportsman->id]) ?>'">
                            <td><?= Html::encode($sportsman->name) ?></td>
                            <td><?= Html::encode($sportsman->discharge) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>