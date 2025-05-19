<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

$this->title = 'Список спортсменов и видов спорта';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="data-container">
    <div class="filter-container">
        <h1 class="data-title"><?= Html::encode($this->title) ?></h1>

        <div class="filter-card">
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'options' => ['class' => 'filter-form'],
                'fieldConfig' => [
                    'options' => ['class' => 'filter-field'],
                    'template' => "{label}\n{input}\n{error}",
                ],
            ]); ?>

            <div class="filter-row">
                <div class="filter-col">
                    <?= $form->field($model, 'sport_count')->textInput([
                        'type' => 'number',
                        'placeholder' => 'Введите количество видов спорта',
                        'class' => 'form-control filter-input'
                    ]) ?>
                </div>

                <div class="filter-col filter-buttons">
                    <?= Html::submitButton('<i class="fas fa-search"></i> Поиск', [
                        'class' => 'btn btn-primary filter-btn'
                    ]) ?>
                    <?= Html::a('<i class="fas fa-broom"></i> Показать всех спортсменов', ['index'], [
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
            <?php if (!empty($sportsmenData)): ?>
                <div class="results-count">
                    Найдено: <?= count($sportsmenData) ?> записей
                </div>
            <?php endif; ?>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="40%">Имя спортсмена</th>
                        <th width="40%">Виды спорта</th>
                        <th width="20%">Количество видов спорта</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sportsmenData)): ?>
                        <?php foreach ($sportsmenData as $sportsman): ?>
                            <tr>
                                <td><?= Html::encode($sportsman['sportsman_name']) ?></td>
                                <td><?= Html::encode($sportsman['sports']) ?></td>
                                <td><?= Html::encode($sportsman['sport_count']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">Нет данных для отображения</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>