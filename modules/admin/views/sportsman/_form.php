<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SportsClub;

/** @var yii\web\View $this */
/** @var app\models\Sportsmen $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sportsmen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Введите имя спортсмена']) ?>

    <?= $form->field($model, 'discharge')->textInput(['maxlength' => true, 'placeholder' => 'Введите разряд']) ?>

    <?= $form->field($model, 'id_sports_club')->dropDownList(
    SportsClub::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt' => 'Выберите спортивный клуб']
) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>