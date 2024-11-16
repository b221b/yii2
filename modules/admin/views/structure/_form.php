<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Structure $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $types */ // Убедитесь, что вы передали $types в представление
?>

<div class="structure-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
        array_combine($types, $types), // Создаем ассоциативный массив для выпадающего списка
        ['prompt' => 'Выберите тип'] // Подсказка для выпадающего списка
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
