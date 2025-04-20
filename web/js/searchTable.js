$(document).ready(function() {
    // Обработчик клика по иконке лупы
    $('.search-icon').on('click', function() {
        $('.search-box').toggleClass('visible');
        if ($('.search-box').hasClass('visible')) {
            setTimeout(function() {
                $('#tableSearchInput').focus();
            }, 400); // Задержка для плавного появления
        }
    });
    
    // Обработчик ввода текста в поисковую строку
    $('#tableSearchInput').on('input', function() {
        const searchText = $(this).val().toLowerCase();
        const $results = $('.search-results');
        
        if (searchText.length > 0) {
            // Фильтрация результатов
            let hasResults = false;
            $('.search-result-item').each(function() {
                const itemText = $(this).text().toLowerCase();
                if (itemText.includes(searchText)) {
                    $(this).show();
                    hasResults = true;
                } else {
                    $(this).hide();
                }
            });
            
            if (hasResults) {
                $results.stop(true, true).fadeIn(200);
            } else {
                $results.stop(true, true).fadeOut(200);
            }
        } else {
            $results.stop(true, true).fadeOut(200);
        }
    });
    
    // Скрытие результатов при клике вне области поиска
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search-container').length) {
            $('.search-results').fadeOut(200);
            if ($('.search-box').hasClass('visible') && $('#tableSearchInput').val() === '') {
                $('.search-box').removeClass('visible');
            }
        }
    });
    
    // Закрытие поиска при нажатии ESC
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') {
            $('.search-results').fadeOut(200);
            if ($('#tableSearchInput').val() === '') {
                $('.search-box').removeClass('visible');
            }
            $('#tableSearchInput').val('');
        }
    });
});