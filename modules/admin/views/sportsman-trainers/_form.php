<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sportsman;
use app\models\Trainers;

/** @var yii\web\View $this */
/** @var app\models\SportsmenTreners $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sportsmen-treners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sportsman')->dropDownList(
        \yii\helpers\ArrayHelper::map(Sportsman::find()->all(), 'id', 'name'), 
        ['prompt' => 'Выберите спортсмена']
    ) ?>

    <?= $form->field($model, 'id_trainers')->dropDownList(
        \yii\helpers\ArrayHelper::map(Trainers::find()->all(), 'id', 'name'), 
        ['prompt' => 'Выберите тренера']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>