<?php

use app\models\Org;
use app\models\Sorevnovaniya;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrgSorevnovaniya $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="org-sorevnovaniya-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_org')->dropDownList(
        \yii\helpers\ArrayHelper::map(Org::find()->all(), 'id', 'fio'), 
        ['prompt' => 'Выберите организацию']
    ) ?>

    <?= $form->field($model, 'id_sorevnovaniya')->dropDownList(
        \yii\helpers\ArrayHelper::map(Sorevnovaniya::find()->all(), 'id', 'name'), 
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
