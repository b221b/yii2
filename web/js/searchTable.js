$(document).on('focus', '.table-search-input', function() {
    console.log('Input focused'); // Проверка срабатывания события
    console.log($(this).next('.search-results').length); // Проверка наличия элемента результатов
    $(this).next('.search-results').show();
    filterTables(this);
});

$(document).on('keyup', '#tableSearchInput', function () {
    filterTables(this);
});

$(document).on('click', function (e) {
    if (!$(e.target).closest('.table-search-widget').length) {
        $('.search-results').hide();
    }
});

$(document).on('click', '.table-item', function () {
    var tableName = $(this).data('table');
    window.location.href = $(this).closest('.table-search-widget').data('url') + '?table=' + encodeURIComponent(tableName);
});

function filterTables(inputElement) {
    var searchText = $(inputElement).val().toLowerCase();
    $(inputElement).next('.search-results').find('.table-item').each(function () {
        var displayText = $(this).text().toLowerCase();
        $(this).toggle(displayText.indexOf(searchText) !== -1);
    });
}