<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sportsmen;
use app\models\Treners;

/** @var yii\web\View $this */
/** @var app\models\SportsmenTreners $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sportsmen-treners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sportsmen')->dropDownList(
        \yii\helpers\ArrayHelper::map(Sportsmen::find()->all(), 'id', 'name'), // замените 'name' на реальное имя поля
        ['prompt' => 'Выберите спортсмена']
    ) ?>

    <?= $form->field($model, 'id_treners')->dropDownList(
        \yii\helpers\ArrayHelper::map(Treners::find()->all(), 'id', 'name'), // замените 'name' на реальное имя поля
        ['prompt' => 'Выберите тренера']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>