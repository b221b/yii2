<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sportsman;
use app\models\Trainers;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SportsmenTrenersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sportsmen-treners-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<?= $form->field($model, 'id_sportsman')->dropDownList(
    \yii\helpers\ArrayHelper::map(Sportsman::find()->all(), 'id', 'name'), 
    ['prompt' => 'Выберите спортсмена']
) ?>

<?= $form->field($model, 'id_trainers')->dropDownList(
    \yii\helpers\ArrayHelper::map(Trainers::find()->all(), 'id', 'name'), 
    ['prompt' => 'Выберите тренера']
) ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
