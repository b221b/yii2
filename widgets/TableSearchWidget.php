<?php
namespace app\widgets;

use yii\base\Widget;
use Yii;

class TableSearchWidget extends Widget
{
    public function run()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $forbiddenTables = ['user', 'competitions', 'user_info', 'migration', 'organisations_competitions', 'sportsman_competitions', 'sportsman_kind_of_sport', 'sportsman_prizewinner', 'sportsman_trainers'];

        $tableNamesMap = [
            'kind_of_sport' => 'Виды спорта',
            'organisations' => 'Организации',
            'prizewinner' => 'Призовые места',
            'sports_club' => 'Спортивные клубы',
            'sportsman' => 'Спортсмены',
            'structure' => 'Спортивные сооружения',
            'trainers' => 'Тренеры',
        ];

        $tables = array_filter($tables, function($table) use ($forbiddenTables) {
            if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
                return !in_array($table, $forbiddenTables);
            }
            return true;
        });

        $tablesForDisplay = [];
        foreach ($tables as $table) {
            if (isset($tableNamesMap[$table])) {
                $tablesForDisplay[$table] = $tableNamesMap[$table];
            }
        }

        return $this->render('tableSearch', [
            'tables' => $tablesForDisplay
        ]);
    }
}