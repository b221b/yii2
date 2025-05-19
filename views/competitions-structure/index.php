<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Перечень соревнований по сооружениям и видам спорта';
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
                    <?= $form->field($model, 'id_structure')->dropDownList(
                        $structures,
                        [
                            'prompt' => 'Выберите спортивное сооружение',
                            'class' => 'form-control filter-select'
                        ]
                    ) ?>
                </div>

                <div class="filter-col">
                    <?= $form->field($model, 'id_kind_of_sport')->dropDownList(
                        $vidSportas,
                        [
                            'prompt' => 'Выберите вид спорта',
                            'class' => 'form-control filter-select'
                        ]
                    ) ?>
                </div>

                <div class="filter-col filter-buttons">
                    <?= Html::submitButton('<i class="fas fa-search"></i> Получить записи', [
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
            <h2 class="section-title">Список соревнований</h2>
            <div class="results-count">
                Найдено: <?= count($competitions) ?> записей
            </div>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="30%">Название соревнования</th>
                        <th width="25%">Спортивное сооружение</th>
                        <th width="20%">Тип сооружения</th>
                        <th width="25%">Вид спорта</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($competitions as $competition): ?>
                        <tr class="clickable-row" onclick="window.location.href='<?= Url::to(['/competitions/view', 'id' => $competition->id]) ?>'">
                            <td><?= Html::encode($competition->name) ?></td>
                            <td><?= Html::encode($competition->structure->name) ?></td>
                            <td><?= Html::encode($competition->structure->type) ?></td>
                            <td><?= Html::encode($competition->kindOfSport->name) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>