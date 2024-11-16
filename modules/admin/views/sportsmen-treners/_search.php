<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sportsmen;
use app\models\Treners;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SportsmenTrenersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sportsmen-treners-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<?= $form->field($model, 'id_sportsmen')->dropDownList(
    \yii\helpers\ArrayHelper::map(Sportsmen::find()->all(), 'id', 'name'), // замените 'name' на реальное имя поля
    ['prompt' => 'Выберите спортсмена']
) ?>

<?= $form->field($model, 'id_treners')->dropDownList(
    \yii\helpers\ArrayHelper::map(Treners::find()->all(), 'id', 'name'), // замените 'name' на реальное имя поля
    ['prompt' => 'Выберите тренера']
) ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
