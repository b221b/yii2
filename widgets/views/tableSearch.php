<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;

?>

<div class="table-search-widget" data-url="<?= Url::to(['site/table-data']) ?>">
    <?= Html::textInput('table_search', '', [
        'class' => 'form-control table-search-input',
        'id' => 'tableSearchInput',
        'placeholder' => 'Поиск ...',
        'autocomplete' => 'off',
    ]) ?>

    <div class="search-results" style="display: none;">
        <ul class="list-group">
            <?php foreach ($tables as $original => $display): ?>
                <li class="list-group-item table-item" data-table="<?= Html::encode($original) ?>">
                    <?= Html::encode($display) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
