<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VidSporta;

/** @var yii\web\View $this */
/** @var app\models\Treners $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="treners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_vid_sporta')->dropDownList(
    \yii\helpers\ArrayHelper::map(VidSporta::find()->all(), 'id', 'name'),
    ['prompt' => 'Выберите вид спорта']
) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
