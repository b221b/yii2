<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Structure;
use app\models\VidSporta;
use app\models\Prizer;

$this->title = 'Создать Соревнование';
$this->params['breadcrumbs'][] = ['label' => 'Соревнования', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="sorevnovaniya-create">

    <div class="sorevnovaniya-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'data_provedeniya')->textInput(['type' => 'date']) ?>
        
        <?= $form->field($model, 'id_structure')->dropDownList(
            Structure::find()->select(['name', 'id'])->indexBy('id')->column(),
            ['prompt' => 'Выберите структуру']
        ) ?>
        
        <?= $form->field($model, 'id_vid_sporta')->dropDownList(
            VidSporta::find()->select(['name', 'id'])->indexBy('id')->column(),
            ['prompt' => 'Выберите вид спорта']
        ) ?>
        
        <?= $form->field($model, 'id_prizer')->dropDownList(
            Prizer::find()->select(['nagrada', 'id'])->indexBy('id')->column(),
            ['prompt' => 'Выберите призера']
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
