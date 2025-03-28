<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Structure;
use app\models\KindOfSport;
use app\models\Prizewinner;
use app\models\Sportsman;

$this->title = 'Создать Соревнование';
$this->params['breadcrumbs'][] = ['label' => 'Соревнования CRUD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="sorevnovaniya-create">

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
        <?= $form->field($model, 'event_date')->textInput(['type' => 'date']) ?>

        <?= $form->field($model, 'id_structure')->dropDownList(
            Structure::find()->select(['name', 'id'])->indexBy('id')->column(),
            ['prompt' => 'Выберите структуру']
        ) ?>

        <?= $form->field($model, 'id_kind_of_sport')->dropDownList(
            KindOfSport::find()->select(['name', 'id'])->indexBy('id')->column(),
            ['prompt' => 'Выберите вид спорта']
        ) ?>

        <div id="prizer-container">
            <h3>Призеры</h3>
            <?php foreach (Prizewinner::find()->all() as $prizer): ?>
                <div class="prizer-group">
                    <label><?= Html::encode($prizer->reward) ?></label>
                    <?= Html::dropDownList(
                        "prizer[{$prizer->id}]",
                        null,
                        Sportsman::find()->select(['name', 'id'])->indexBy('id')->column(),
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