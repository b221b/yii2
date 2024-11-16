<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Structure;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\StructureCharsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="structure-chars-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_structure')->dropDownList(
        \yii\helpers\ArrayHelper::map(Structure::find()->all(), 'id', 'name'), // замените 'name' на нужное поле
        ['prompt' => 'Выберите структуру']
    ) ?>

    <?= $form->field($model, 'vmestimost') ?>

    <?= $form->field($model, 'tip_pokritiya') ?>

    <?= $form->field($model, 'kolvo_oborydovaniya') ?>

    <?php // echo $form->field($model, 'kolvo_tribun') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>