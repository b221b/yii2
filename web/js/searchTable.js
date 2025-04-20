$(document).ready(function() {
    const searchContainer = $('.search-container');
    const searchIcon = $('.search-icon');
    const searchBox = $('.search-box');
    const searchInput = $('#tableSearchInput');
    const searchResults = $('.search-results');
    
    // Открытие/закрытие поиска
    searchIcon.on('click', function(e) {
        e.stopPropagation();
        searchBox.toggleClass('active');
        searchInput.focus();
    });
    
    // Фильтрация результатов
    searchInput.on('input', function() {
        const searchText = $(this).val().toLowerCase();
        let hasResults = false;
        
        $('.search-result-item').each(function() {
            const itemText = $(this).text().toLowerCase();
            const isVisible = itemText.includes(searchText);
            $(this).toggle(isVisible);
            if (isVisible) hasResults = true;
        });
        
        searchResults.toggle(hasResults);
    });
    
    // Закрытие при клике вне области
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search-container').length) {
            searchBox.removeClass('active');
            searchResults.hide();
        }
    });
});