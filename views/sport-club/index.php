<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Перечень клубов и участников соревнований по периоду';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="search-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_date')->input('date') ?>
    <?= $form->field($model, 'end_date')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Получить все записи', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<h2>Результаты</h2>
<table class="table">
    <thead>
        <tr>
            <th>Спортивный клуб</th>
            <th>Количество спортсменов</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($dataProvider): ?>
            <?php foreach ($dataProvider as $item): ?>
                <tr>
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