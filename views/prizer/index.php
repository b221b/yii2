<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Список призеров';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="prizer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sorevnovanie_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($sorevnovaniya, 'id', 'name'),
        ['prompt' => 'Выберите соревнование']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Показать призеров', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Показать всех призеров', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<h2>Список призеров</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Спортсмен</th>
            <th>Соревнование</th>
            <th>Место</th>
            <th>Награда</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($prizers)): ?>
            <?php foreach ($prizers as $prizer): ?>
                <tr>
                    <td><?= Html::encode($prizer['sportsman_name']) ?></td>
                    <td><?= Html::encode($prizer['sorevnovanie_name']) ?></td>
                    <td><?= Html::encode($prizer['mesto']) ?></td>
                    <td><?= Html::encode($prizer['nagrada']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>