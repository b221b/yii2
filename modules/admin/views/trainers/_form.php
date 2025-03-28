<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\KindOfSport;

/** @var yii\web\View $this */
/** @var app\models\Treners $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="treners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kind_of_sport')->dropDownList(
    \yii\helpers\ArrayHelper::map(KindOfSport::find()->all(), 'id', 'name'),
    ['prompt' => 'Выберите вид спорта']
) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
