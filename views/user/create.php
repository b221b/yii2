<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактирование контактных данных';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-update container mt-4 text-center">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title mb-0"><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'needs-validation'],
                'fieldConfig' => [
                    'template' => "<div class='row mb-3'><div class='col-md-3'>{label}</div><div class='col-md-9'>{input}{error}</div></div>",
                    'labelOptions' => ['class' => 'col-form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'invalid-feedback'],
                ],
            ]); ?>

            <?php if ($model->hasErrors()): ?>
                <div class="alert alert-danger">
                    <?= Html::errorSummary($model) ?>
                </div>
            <?php endif; ?>

            <div class="row mb-3">
                <?= $form->field($model, 'phone_number', [
                    'template' => "<div class='row mb-3'><div class='col-md-3'>{label}</div><div class='col-md-9'><div class='input-group'>{input}</div>{error}</div></div>"
                ])->textInput([
                    'maxlength' => 16,
                    'class' => 'form-control phone-input',
                    'placeholder' => '+7 999 999 99 99',
                    'pattern' => '^\+7 \d{3} \d{3} \d{2} \d{2}',
                    'title' => 'Формат: +7 999 999 99 99',
                    'value' => !empty($model->phone_number) ? $model->phone_number : '+7 ',
                    'oninput' => 'formatPhoneNumber(this)',
                    'onblur' => 'validatePhoneNumber(this)',
                    'onkeydown' => 'protectPrefix(event)'
                ])->label('Номер телефона') ?>
            </div>

            <div class="row mb-3">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'example@domain.com']) ?>
            </div>

            <div class="row mb-3">
                <?= $form->field($model, 'birthday')->textInput([
                    'type' => 'date',
                    'class' => 'form-control',
                    'maxlength' => true,
                    'pattern' => '\d{4}-\d{2}-\d{2}',
                    'title' => 'Формат: гггг-мм-дд'
                ]) ?>
            </div>

            <div class="row mb-3">
                <?= $form->field($model, 'gender')->radioList([
                    1 => 'Мужской',
                    2 => 'Женский'
                ], [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        return "<div class=\"form-check form-check-inline\">
                            <input class=\"form-check-input\" type=\"radio\" name=\"{$name}\" id=\"gender{$index}\" value=\"{$value}\" " . ($checked ? 'checked' : '') . ">
                            <label class=\"form-check-label\" for=\"gender{$index}\">{$label}</label>
                        </div>";
                    }
                ])->label('Пол') ?>
            </div>

            <div class="row mb-3">
                <?= $form->field($model, 'id_kind_of_sport')->dropDownList($sportsKind, ['prompt' => 'Выберите вид спорта']) ?>
            </div>

            <div class="row mb-3">
                <?= $form->field($model, 'id_sports_club')->dropDownList($sportsClub, ['prompt' => 'Выберите клуб']) ?>
            </div>

            <div class="row mb-3">
                <?= $form->field($model, 'id_trainers')->dropDownList($trainer, ['prompt' => 'Выберите тренера']) ?>
            </div>

            <div class="row mb-3">
                <?= $form->field($model, 'discharge')->dropDownList(
                    [
                        1 => '1 разряд',
                        2 => '2 разряд',
                        3 => '3 разряд',
                    ],
                    [
                        'prompt' => 'Выберите разряд',
                        'class' => 'form-control'
                    ]
                ) ?>
            </div>

            <div class="form-group row">
                <div class="col-md-9 offset-md-3">
                    <?= Html::submitButton('<i class="fas fa-save me-2"></i> Сохранить изменения', ['class' => 'btn btn-primary px-4']) ?>
                    <?= Html::a('<i class="fas fa-times me-2"></i> Отмена', ['index'], ['class' => 'btn btn-outline-secondary ms-2']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>