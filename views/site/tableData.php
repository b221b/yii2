<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$tableNamesMap = [
    'kind_of_sport' => 'Виды спорта',
    'organisations' => 'Организации',
    'prizewinner' => 'Призовые места',
    'sports_club' => 'Спортивные клубы',
    'sportsman' => 'Спортсмены',
    'structure' => 'Спортивные сооружения',
    'trainers' => 'Тренеры',
];

$columnLabels = [
    'kind_of_sport' => ['name' => 'Название'],
    'organisations' => ['full_name' => 'Название организатора'],
    'prizewinner' => [
        'prize_place' => 'Призовое место',
        'reward' => 'Награда',
    ],
    'sports_club' => ['name' => 'Название клуба'],
    'sportsman' => [
        'name' => 'Имя',
        'discharge' => 'Разряд',
        'id_sports_club' => 'Номер спортивного клуба',
    ],
    'structure' => [
        'name' => 'Название сооружения',
        'type' => 'Тип',
    ],
    'trainers' => [
        'name' => 'ФИО тренера',
        'id_kind_of_sport' => 'Вид спорта',
    ],
];

$this->title = ($tableNamesMap[$tableName] ?? $tableName);
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="data-container">
    <div class="data-header">
        <h1 class="data-title"><?= Html::encode($this->title) ?></h1>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'data-table'],
        'rowOptions' => function ($model) use ($tableName, $pkField) {
            return [
                'class' => 'clickable-row',
                'onclick' => 'window.location.href="' . Url::to(['view-record', 'table' => $tableName, 'id' => $model[$pkField]]) . '"',
            ];
        },
        'columns' => array_map(
            function ($column) use ($tableName, $columnLabels, $tableNamesMap) {
                return [
                    'attribute' => $column,
                    'label' => $columnLabels[$tableName][$column] ?? $column,
                    'content' => function ($model) use ($column, $tableName, $columnLabels, $tableNamesMap) {
                        if (strpos($column, 'id_') === 0) {
                            $relatedTable = substr($column, 3);
                            if (isset($tableNamesMap[$relatedTable])) {
                                return $model[$column] . ' (' . $tableNamesMap[$relatedTable] . ')';
                            }
                        }
                        return Html::encode($model[$column]);
                    },
                    'headerOptions' => ['style' => 'color: white;'],
                ];
            },
            array_filter(
                array_keys(Yii::$app->db->getTableSchema($tableName)->columns),
                function ($column) {
                    return $column !== 'id'
                        && $column !== 'id_sports_club'
                        && $column !== 'id_kind_of_sport';
                }
            )
        ),
        'pager' => [
            'options' => ['class' => 'pagination'],
            'linkOptions' => ['class' => 'page-link'],
            'activePageCssClass' => 'active',
            'disabledPageCssClass' => 'disabled',
        ],
    ]) ?>
</div>