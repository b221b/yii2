function protectPrefix(event) {
    const input = event.target;
    // Запрещаем удаление "+7" если курсор в начале
    if (event.key === 'Backspace' || event.key === 'Delete') {
        if (input.selectionStart <= 2 && input.selectionEnd <= 2) {
            event.preventDefault();
        }
    }
    // Запрещаем вставку (Ctrl+V) если это может повредить префикс
    if (event.ctrlKey && event.key === 'v') {
        setTimeout(() => {
            if (!input.value.startsWith('+7')) {
                input.value = '+7 ' + input.value.replace(/\D/g, '').substring(0, 9);
                formatPhoneNumber(input);
            }
        }, 0);
    }
}

function formatPhoneNumber(input) {
    // Если значение не начинается с +7, добавляем его
    if (!input.value.startsWith('+7')) {
        input.value = '+7 ' + input.value.replace(/\D/g, '');
    }

    // Удаляем все нецифровые символы, кроме первых 3
    let value = input.value.replace(/\D/g, '').substring(1); // Убираем префикс +7

    // Форматируем номер
    let formattedNumber = '+7 ';

    if (value.length > 0) {
        formattedNumber += value.substring(0, 3); // Первые 3 цифры
    }
    if (value.length > 3) {
        formattedNumber += ' ' + value.substring(3, 6); // Следующие 3 цифры
    }
    if (value.length > 6) {
        formattedNumber += ' ' + value.substring(6, 8); // Следующие 2 цифры
    }
    if (value.length > 8) {
        formattedNumber += ' ' + value.substring(8, 10); // Последние 2 цифры
    }

    // Устанавливаем отформатированное значение в поле ввода
    input.value = formattedNumber.trim();
    input.setCustomValidity(input.validity.patternMismatch ? input.title : "");
}

function validatePhoneNumber(input) {
    // Если поле пустое или содержит только +7, устанавливаем полное значение +7 с пробелом
    if (input.value.trim() === '+7' || input.value.trim() === '') {
        input.value = '+7 ';
    }
    // Проверяем соответствие шаблону
    input.setCustomValidity(input.validity.patternMismatch ? input.title : "");
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.querySelector('.phone-input');
    if (phoneInput && !phoneInput.value.startsWith('+7')) {
        phoneInput.value = '+7 ';
    }
});