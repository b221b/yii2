<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Ввод токена восстановления';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center mb-0"><?= Html::encode($this->title) ?></h2>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'token-verification-form']); ?>

                    <div class="alert alert-info">
                        <p>Пожалуйста, введите токен восстановления, который вы получили по электронной почте.</p>
                    </div>

                    <?= $form->field($model, 'token')->textInput([
                        'autofocus' => true,
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Вставьте ваш токен здесь'
                    ])->label(false) ?>

                    <div class="form-group mt-4">
                        <?= Html::submitButton('Продолжить', [
                            'class' => 'btn btn-primary btn-lg w-100'
                        ]) ?>
                    </div>

                    <div class="text-center mt-3">
                        <?= Html::a('Не получили токен? Отправить повторно', ['request-password-reset'], ['class' => 'text-muted']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>