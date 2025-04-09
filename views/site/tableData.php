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

$this->title = 'Данные таблицы: ' . ($tableNamesMap[$tableName] ?? $tableName);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => array_keys(Yii::$app->db->getTableSchema($tableName)->columns),
]) ?>