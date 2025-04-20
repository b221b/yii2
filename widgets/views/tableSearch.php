<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="search-container">
    <div class="search-icon">
        <i class="fas fa-search"></i>
    </div>
    
    <div class="search-box">
        <input type="text" 
               class="form-control search-input" 
               placeholder="Поиск таблиц..."
               autocomplete="off"
               id="tableSearchInput">
        
        <div class="search-results">
            <?php foreach ($tables as $original => $display): ?>
                <a href="<?= Url::to(['site/table-data', 'table' => $original]) ?>" 
                   class="search-result-item">
                   <?= Html::encode($display) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>