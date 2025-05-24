<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class=" mb-0"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">Пожалуйста, введите ваш email. Мы отправим ссылку для восстановления пароля.</p>

                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email')->textInput([
                        'autofocus' => true,
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Ваш email'
                    ])->label(false) ?>

                    <div class="form-group mt-4">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-lg w-100']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <div class="text-center mt-3">
                        <?= Html::a('Вернуться к входу', ['site/login'], ['class' => 'text-muted']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>