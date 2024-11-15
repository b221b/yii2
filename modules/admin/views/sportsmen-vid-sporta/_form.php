<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sportsmen;
use app\models\VidSporta;

/** @var yii\web\View $this */
/** @var app\models\SportsmenVidSporta $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sportsmen-vid-sporta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sportsmen')->dropDownList(
        \yii\helpers\ArrayHelper::map(Sportsmen::find()->all(), 'id', 'name'), // Предполагаем, что у Sportsmen есть поле name
        ['prompt' => 'Выберите спортсмена']
    ) ?>

    <?= $form->field($model, 'id_vid_sporta')->dropDownList(
        \yii\helpers\ArrayHelper::map(VidSporta::find()->all(), 'id', 'name'), // Предполагаем, что у VidSporta есть поле name
        ['prompt' => 'Выберите вид спорта']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>