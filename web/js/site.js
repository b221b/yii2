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





// Simple counter animation for stats
    document.addEventListener('DOMContentLoaded', function() {
        const statNumbers = document.querySelectorAll('.stat-number');

        statNumbers.forEach(stat => {
            const target = parseInt(stat.getAttribute('data-count'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const updateCount = () => {
                current += step;
                if (current < target) {
                    stat.textContent = Math.floor(current);
                    requestAnimationFrame(updateCount);
                } else {
                    stat.textContent = target;
                }
            };

            // Start counting when element is in viewport
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    updateCount();
                    observer.unobserve(stat);
                }
            });

            observer.observe(stat);
        });
    });