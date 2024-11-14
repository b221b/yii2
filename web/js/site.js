// <?php
// $script = <<< JS

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
$('#structure-type').change(function () {
    updateDynamicFields();
});

// Обработчик для кнопки "Очистить"
$('#clear-button').click(function () {
    $('#structure-type').val(''); // Сбрасываем выпадающий список
    $('#dynamic-fields > div').hide(); // Скрываем все динамические поля 
    $('#dynamic-fields input').val(''); // Очищаем все поля ввода 
    $('#results-table').hide(); // Скрываем таблицу с результатами
});

// JS;
// $this->registerJs($script);
// ?>