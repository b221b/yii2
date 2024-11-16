<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Structure;

/** @var yii\web\View $this */
/** @var app\models\StructureChars $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="structure-chars-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_structure')->dropDownList(
        \yii\helpers\ArrayHelper::map(Structure::find()->all(), 'id', 'name'), // замените 'name' на нужное поле
        ['prompt' => 'Выберите структуру']
    ) ?>

    <?= $form->field($model, 'vmestimost')->textInput() ?>

    <?= $form->field($model, 'tip_pokritiya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kolvo_oborydovaniya')->textInput() ?>

    <?= $form->field($model, 'kolvo_tribun')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>