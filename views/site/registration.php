<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\RegistrationForm $model */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-registration">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Уже зарегистрированы? <?= Html::a('Войдите здесь', ['site/login']) ?></p>

    <p>Пожалуйста, заполните следующий поля для регистрации:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'registration-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <div>
                    <?= Html::button(
                        '<span class="nisoz-btn__shape"></span>
                        <span class="nisoz-btn__shape"></span>
                        <span class="nisoz-btn__shape"></span>
                        <span class="nisoz-btn__shape"></span>
                        <span class="nisoz-btn__text">Зарегистрироваться</span>',
                        ['type' => 'submit', 'class' => 'nisoz-btn']
                    ) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>