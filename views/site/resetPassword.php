<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Сброс пароля';
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
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                    <?= $form->field($model, 'password')->passwordInput([
                        'autofocus' => true,
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Новый пароль'
                    ])->label(false) ?>

                    <?= $form->field($model, 'password_repeat')->passwordInput([
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Повторите новый пароль'
                    ])->label(false) ?>

                    <div class="form-group mt-4">
                        <?= Html::submitButton('Сохранить пароль', [
                            'class' => 'btn btn-primary btn-lg w-100'
                        ]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($model->hasErrors()): ?>
    <div class="alert alert-danger">
        <?= Html::errorSummary($model) ?>
    </div>
<?php endif; ?>