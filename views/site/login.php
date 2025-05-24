<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Не зарегистрированы? <?= Html::a('Зарегистрируйтесь здесь', ['site/register']) ?></p>

    <p>Пожалуйста, заполните следующий поля для авторизации:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::a('Забыли пароль?', ['/forgot-password']) ?>
            </div>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">

                <div>
                    <?= Html::button(
                        '<span class="nisoz-btn__shape"></span>
         <span class="nisoz-btn__shape"></span>
         <span class="nisoz-btn__shape"></span>
         <span class="nisoz-btn__shape"></span>
         <span class="nisoz-btn__text">Войти</span>',
                        ['type' => 'submit', 'class' => 'nisoz-btn']
                    ) ?>
                </div>

            </div>

            <?php ActiveForm::end(); ?>

            <!-- <div style="color:#999;">
                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                To modify the username/password, please check out the code <code>app\models\User::$users</code>.
            </div> -->

        </div>
    </div>
</div>