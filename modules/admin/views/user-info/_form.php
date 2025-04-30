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

    <!-- Поля UserInfo -->
    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <!-- Поле для выбора пользователя -->
    <?= $form->field($model, 'id_user')->dropDownList(
        \yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'username'),
        ['prompt' => 'Выберите пользователя']
    ) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            0 => 'Не активна',
            1 => 'Активна',
            2 => 'На рассмотрении',
            ['prompt' => 'Выберите статус']
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>