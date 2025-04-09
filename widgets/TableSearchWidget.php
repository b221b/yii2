<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use Yii;

class TableSearchWidget extends Widget
{
    public function run()
    {
        $tables = Yii::$app->db->schema->getTableNames();

        // Таблицы, запрещённые для обычных пользователей
        $forbiddenTables = ['user', 'competitions', 'user_info', 'migration', 'organisations_competitions', 'sportsman_competitions', 'sportsman_kind_of_sport', 'sportsman_prizewinner', 'sportsman_trainers'];

        // Соответствие английских и русских названий таблиц
        $tableNamesMap = [
            'kind_of_sport' => 'Виды спорта',
            'organisations' => 'Организации',
            'prizewinner' => 'Призовые места',
            'sports_club' => 'Спортивные клубы',
            'sportsman' => 'Спортсмены',
            'structure' => 'Спортивные сооружения',
            'trainers' => 'Тренеры',
        ];

        // Фильтруем таблицы
        $tables = array_filter($tables, function ($table) use ($forbiddenTables) {
            if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
                return !in_array($table, $forbiddenTables);
            }
            return true;
        });

        // Создаем массив для отображения [английское название => русское название]
        $tablesForDisplay = [];
        foreach ($tables as $table) {
            $tablesForDisplay[$table] = $tableNamesMap[$table] ?? $table;
        }

        return $this->render('tableSearch', [
            'tables' => $tablesForDisplay,
            'originalTables' => array_combine($tables, $tables), // Сохраняем оригинальные названия
        ]);
    }
}
