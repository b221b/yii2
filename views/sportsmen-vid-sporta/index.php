<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Список спортсменов';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="sportsmen-form">

    <?php $form = ActiveForm::begin(['method' => 'post']); ?>

    <?= $form->field($model, 'sport_count')->textInput(['type' => 'number', 'placeholder' => 'Введите количество видов спорта']) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Показать всех спортсменов', ['index'], ['class' => 'btn btn-default', 'data-method' => 'post']) ?> 
    </div>

    <?php ActiveForm::end(); ?>

</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Имя спортсмена</th>
            <th>Виды спорта</th>
            <th>Количество видов спорта</th>
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
