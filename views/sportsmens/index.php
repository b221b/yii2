<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\Sportsmen;
use app\models\VidSporta;

$this->title = 'Запрос спортсменов';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="sportsmen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="sportsmen-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'razryad')->textInput(['type' => 'number', 'placeholder' => 'Введите разряд']) ?>

        <?= $form->field($model, 'id_vid_sporta')->dropDownList(
            \yii\helpers\ArrayHelper::map($vidSportaList, 'id', 'name'),
            ['prompt' => 'Выберите вид спорта']
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Показать всех спортсменов', ['index'], ['class' => 'btn btn-default']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <h2>Список спортсменов:</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Разряд</th>
                <th>Вид спорта</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->models as $sportsman): ?>
                <tr>
                    <td><?= Html::encode($sportsman->name) ?></td>
                    <td><?= Html::encode($sportsman->razryad) ?></td>
                    <td>
                        <?php
                        // Получаем виды спорта для каждого спортсмена
                        $vidSportaNames = [];
                        foreach ($sportsman->sportsmenVidSporta as $relation) {
                            $vidSportaNames[] = $relation->vidSporta->name; 
                        }
                        echo Html::encode(implode(', ', $vidSportaNames));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>