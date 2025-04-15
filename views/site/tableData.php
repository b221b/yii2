<?php

use yii\grid\GridView;
use yii\helpers\Html;

$tableNamesMap = [
    'kind_of_sport' => 'Виды спорта',
    'organisations' => 'Организации',
    'prizewinner' => 'Призовые места',
    'sports_club' => 'Спортивные клубы',
    'sportsman' => 'Спортсмены',
    'structure' => 'Спортивные сооружения',
    'trainers' => 'Тренеры',
];

// Массив соответствий столбцов и их русских названий
$columnLabels = [
    'kind_of_sport' => [
        'name' => 'Название',
    ],
    'organisations' => [
        'full_name' => 'Название организатора',
    ],
    'prizewinner' => [
        'prize_place' => 'Призовое место',
        'reward' => 'Награда',
    ],
    'sports_club' => [
        'name' => 'Название клуба',
    ],
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

$this->title = 'Данные таблицы: ' . ($tableNamesMap[$tableName] ?? $tableName);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => array_map(
        function ($column) use ($tableName, $columnLabels) {
            return [
                'attribute' => $column,  // Поле в БД
                'label' => $columnLabels[$tableName][$column] ?? $column,  // Русское название (если есть)
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
]) ?>