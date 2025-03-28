<?php

use app\models\Competitions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Sportsman;

/** @var yii\web\View $this */
/** @var app\models\SportsmenSorevnovaniya $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sportsmen-sorevnovaniya-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sportsman')->dropDownList(
        ArrayHelper::map(Sportsman::find()->all(), 'id', 'name'), // Предполагается, что есть поле full_name в модели Sportsmen
        ['prompt' => 'Выберите спортсмена']
    ) ?>

    <?= $form->field($model, 'id_competitions')->dropDownList(
        ArrayHelper::map(Competitions::find()->all(), 'id', 'name'), // Предполагается, что есть поле name в модели Sorevnovaniya
        ['prompt' => 'Выберите соревнование']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
