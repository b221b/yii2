<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SportsClub;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SportsmenSearch $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="sportsmen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите имя спортсмена']) ?>

    <?= $form->field($model, 'discharge')->textInput(['placeholder' => 'Введите разряд']) ?>

    <?= $form->field($model, 'id_sports_club')->dropDownList(
        SportsClub::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Выберите спортивный клуб']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
