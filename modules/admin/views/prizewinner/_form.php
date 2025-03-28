<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Prizer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prizer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prize_place')->textInput() ?>

    <?= $form->field($model, 'reward')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>