<?php

use app\models\Competitions;
use app\models\Organisations;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrgSorevnovaniya $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="org-sorevnovaniya-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_organisations')->dropDownList(
        \yii\helpers\ArrayHelper::map(Organisations::find()->all(), 'id', 'full_name'), 
        ['prompt' => 'Выберите организацию']
    ) ?>

    <?= $form->field($model, 'id_competitions')->dropDownList(
        \yii\helpers\ArrayHelper::map(Competitions::find()->all(), 'id', 'name'), 
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
