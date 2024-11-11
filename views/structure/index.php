<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Запрос спортивных сооружений.';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="structure-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'structure_type')->dropDownList(array_combine($structureTypes, $structureTypes), ['prompt' => 'Выберите тип структуры', 'id' => 'structure-type']) ?>

    <div id="dynamic-fields">
        <div id="stadion-fields" style="display: none;">
            <?= $form->field($model, 'vmestimost')->textInput(['type' => 'number', 'placeholder' => 'Вместимость (необязательно)']) ?>
        </div>
        <div id="kort-fields" style="display: none;">
            <?= $form->field($model, 'tip_pokritiya')->dropDownList(array_combine($tipPokritiyaOptions, $tipPokritiyaOptions), [
                'prompt' => 'Выберите тип покрытия (необязательно)',
            ]) ?>
        </div>
        <div id="sport-zal-fields" style="display: none;">
            <?= $form->field($model, 'kolvo_oborydovaniya')->textInput(['type' => 'number', 'placeholder' => 'Количество оборудования (необязательно)']) ?>
        </div>
        <div id="manezh-fields" style="display: none;">
            <?= $form->field($model, 'kolvo_tribun')->textInput(['type' => 'number', 'placeholder' => 'Количество трибун (необязательно)']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Получить данные', ['class' => 'btn btn-primary']) ?>
        <?= Html::button('Очистить', ['class' => 'btn btn-secondary', 'id' => 'clear-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php if ($dataProvider): ?>
        <h2>Результаты</h2>
        <table class="table table-striped" id="results-table">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Тип</th>
                    <?php if ($model->structure_type == 'Стадион'): ?>
                        <th>Вместимость</th>
                    <?php endif; ?>
                    <?php if ($model->structure_type == 'Корт'): ?>
                        <th>Тип покрытия</th>
                    <?php endif; ?>
                    <?php if ($model->structure_type == 'Спортивный зал'): ?>
                        <th>Количество оборудования</th>
                    <?php endif; ?>
                    <?php if ($model->structure_type == 'Манеж'): ?>
                        <th>Количество трибун</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataProvider as $item): ?>
                    <tr>
                        <td><?= Html::encode($item->structure->name) ?></td>
                        <td><?= Html::encode($item->structure->type) ?></td>
                        <?php if ($model->structure_type == 'Стадион'): ?>
                            <td><?= Html::encode($item->vmestimost ?? 'N/A') ?></td>
                        <?php endif; ?>
                        <?php if ($model->structure_type == 'Корт'): ?>
                            <td><?= Html::encode($item->tip_pokritiya ?? 'N/A') ?></td>
                        <?php endif; ?>
                        <?php if ($model->structure_type == 'Спортивный зал'): ?>
                            <td><?= Html::encode($item->kolvo_oborydovaniya ?? 'N/A') ?></td>
                        <?php endif; ?>
                        <?php if ($model->structure_type == 'Манеж'): ?>
                            <td><?= Html::encode($item->kolvo_tribun ?? 'N/A') ?></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</div>

<?php
$script = <<< JS
function updateDynamicFields() {
    var selected = $('#structure-type').val();
    $('#dynamic-fields > div').hide(); // Скрываем все динамические поля 
    if (selected == 'Стадион') {
        $('#stadion-fields').show(); // Показываем поля для стадиона 
    } else if (selected == 'Корт') {
        $('#kort-fields').show(); // Показываем поля для корта 
    } else if (selected == 'Спортивный зал') {
        $('#sport-zal-fields').show(); // Показываем поля для спортивного зала 
    } else if (selected == 'Манеж') {
        $('#manezh-fields').show(); // Показываем поля для манежа 
    }
}

// Обновляем динамические поля при загрузке страницы
updateDynamicFields();

// Обработчик для изменения выбора
$('#structure-type').change(function() {
    updateDynamicFields();
});

// Обработчик для кнопки "Очистить"
$('#clear-button').click(function() {
    $('#structure-type').val(''); // Сбрасываем выпадающий список
    $('#dynamic-fields > div').hide(); // Скрываем все динамические поля 
    $('#dynamic-fields input').val(''); // Очищаем все поля ввода 
    $('#results-table').hide(); // Скрываем таблицу с результатами
});
JS;
$this->registerJs($script);
?>