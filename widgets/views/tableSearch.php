<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

?>

<div class="table-search-widget">
    <?= Html::textInput('table_search', '', [
        'class' => 'form-control',
        'id' => 'tableSearchInput',
        'placeholder' => 'Поиск ...',
        'autocomplete' => 'off',
    ]) ?>

    <div class="search-results" id="tableSearchResults" style="display: none;">
        <ul class="list-group">
            <?php foreach ($tables as $original => $display): ?>
                <li class="list-group-item table-item" data-table="<?= Html::encode($original) ?>">
                    <?= Html::encode($display) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php
$url = Url::to(['site/table-data']);
$script = <<< JS
$(document).ready(function() {
    var input = $('#tableSearchInput');
    var results = $('#tableSearchResults');
    
    input.on('focus', function() {
        results.show();
        filterTables();
    });
    
    input.on('keyup', function() {
        filterTables();
    });
    
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.table-search-widget').length) {
            results.hide();
        }
    });
    
    $('.table-item').on('click', function() {
        var tableName = $(this).data('table');
        window.location.href = '$url?table=' + encodeURIComponent(tableName);
    });
    
    function filterTables() {
        var searchText = input.val().toLowerCase();
        $('.table-item').each(function() {
            var displayText = $(this).text().toLowerCase();
            if (displayText.indexOf(searchText) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    }
});
JS;

$this->registerJs($script);
?>