<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Перечень соревнований по периоду и организатору';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="sorevnovaniya-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'startDate')->input('date') ?>
    <?= $form->field($model, 'endDate')->input('date') ?>

    <?= $form->field($model, 'full_name')->dropDownList($orgs, ['prompt' => 'Выберите организатора']) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Отобразить всех записи', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<h2>Результаты поиска:</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Название соревнования</th>
            <th>Дата проведения</th>
            <th>Организатор</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProvider->models as $competitions): ?>
            <tr>
                <td><?= Html::encode($competitions->name) ?></td>
                <td><?= Html::encode(Yii::$app->formatter->asDate($competitions->event_date, 'php:d-m-Y')) ?></td>
                <td><?= Html::encode($competitions->organisationsCompetitions[0]->organisations->full_name ?? 'Не указано') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>