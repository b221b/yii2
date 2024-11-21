<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Structure;
use app\models\VidSporta;
use app\models\Sportsmen;
use app\models\Prizer;

$this->title = 'Изменить Соревнование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Соревнования CRUD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="sorevnovaniya-update">

    <div class="sorevnovaniya-form">

        <?php if ($model->hasErrors()): ?>
            <div class="alert alert-danger">
                <strong>Ошибка!</strong> Пожалуйста, исправьте следующие ошибки:
                <ul>
                    <?php foreach ($model->getErrors() as $errors): ?>
                        <?php foreach ($errors as $error): ?>
                            <li><?= Html::encode($error) ?></li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

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

        <div id="prizer-container">
            <h3>Призеры</h3>
            <?php foreach (Prizer::find()->all() as $prizer): ?>
                <div class="prizer-group">
                    <label><?= Html::encode($prizer->nagrada) ?></label>
                    <?= Html::dropDownList(
                        "prizer[{$prizer->id}]",
                        isset($existingPrizers[$prizer->id]) ? $existingPrizers[$prizer->id]->id_sportsmen : null,
                        Sportsmen::find()->select(['name', 'id'])->indexBy('id')->column(),
                        ['prompt' => 'Выберите спортсмена']
                    ); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>