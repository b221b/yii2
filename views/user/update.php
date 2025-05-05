<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование контактных данных';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->radioList([
        1 => 'М',  // Значение 1 для мужского пола
        2 => 'Ж'   // Значение 0 для женского пола
    ])->label('Пол') ?>

    <?= $form->field($model, 'id_kind_of_sport')->dropDownList($sportsKind, ['prompt' => 'Выберите вид спорта']) ?>

    <?= $form->field($model, 'id_sports_club')->dropDownList($sportsClub, ['prompt' => 'Выберите клуб']) ?>

    <?= $form->field($model, 'id_trainers')->dropDownList($trainer, ['prompt' => 'Выберите тренера']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>