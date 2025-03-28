<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sportsman;
use app\models\KindOfSport;

/** @var yii\web\View $this */
/** @var app\models\SportsmenVidSporta $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sportsmen-vid-sporta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sportsman')->dropDownList(
        \yii\helpers\ArrayHelper::map(Sportsman::find()->all(), 'id', 'name'), 
        ['prompt' => 'Выберите спортсмена']
    ) ?>

    <?= $form->field($model, 'id_kind_of_sport')->dropDownList(
        \yii\helpers\ArrayHelper::map(KindOfSport::find()->all(), 'id', 'name'), 
        ['prompt' => 'Выберите вид спорта']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>