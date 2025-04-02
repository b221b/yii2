<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\KindOfSport;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->dropDownList(
        \yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'username'),
        [
            'prompt' => 'Выберите пользователя',
            'required' => true,
            'onchange' => 'validateUserSelect(this)' // добавляем обработчик изменения
        ]
    )->label('Пользователь <span class="required-field">*</span>') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'onclick' => 'return validateForm()']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>