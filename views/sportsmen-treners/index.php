<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Запрос: Спортсмены для тренеров и разряд';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="sportsmen-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trener_id')->dropDownList($trenerOptions, ['prompt' => 'Выберите тренера']) ?>

    <?= $form->field($model, 'razryad')->textInput(['type' => 'number', 'placeholder' => 'Введите разяд']) ?>

    <div class="form-group">
        <?= Html::submitButton('Получить спортсменов', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Показать всех спортсменов', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <h2>Результаты</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Имя спортсмена</th>
                <th>Разряд</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider as $sportsman): ?>
                <tr>
                    <td><?= Html::encode($sportsman->name) ?></td>
                    <td><?= Html::encode($sportsman->razryad) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
