<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\TrenersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'phone_number') ?>

    <?= $form->field($model, 'email') ?>

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
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>