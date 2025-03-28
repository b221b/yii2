<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Перечень соревнований по сооружениям и видам спорта';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sorevnovaniya-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="search-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_structure')->dropDownList($structures, ['prompt' => 'Выберите спортивное сооружение']) ?>

        <?= $form->field($model, 'id_kind_of_sport')->dropDownList($vidSportas, ['prompt' => 'Выберите вид спорта']) ?>

        <div class="form-group">
            <?= Html::submitButton('Получить записи', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Получить все записи', ['index'], ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <h2>Список соревнований</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название соревнования</th>
                <th>Спортивное сооружение</th>
                <th>Тип сооружения</th>
                <th>Вид спорта</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($competitions as $competition): ?> 
                <tr>
                    <td><?= Html::encode($competition->name) ?></td>
                    <td><?= Html::encode($competition->structure->name) ?></td>
                    <td><?= Html::encode($competition->structure->type) ?></td>
                    <td><?= Html::encode($competition->kindOfSport->name) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>