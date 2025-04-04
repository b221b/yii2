<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\UserInfo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">
    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'isAdmin')->dropDownList(
        [
            1 => 'Администратор',
            0 => 'Пользователь',
        ],
        ['prompt' => 'Выберите статус']
    )->label('Статус пользователя') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>