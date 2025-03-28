<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsman;

class SportsmanKindOfSportController extends Controller
{
    public function actionIndex()
    {
        $model = new Sportsman(); // Создаем экземпляр модели
        $sportsmenData = [];
        $sportCount = Yii::$app->request->post('Sportsman')['sport_count'] ?? null;

        // Получаем данные спортсменов по умолчанию
        $query = (new \yii\db\Query())
            ->select(['s.name AS sportsman_name', 'GROUP_CONCAT(vs.name SEPARATOR ", ") AS sports', 'COUNT(svs.id_kind_of_sport) AS sport_count'])
            ->from('sportsman s')
            ->innerJoin('sportsman_kind_of_sport svs', 'svs.id_sportsman = s.id')
            ->innerJoin('kind_of_sport vs', 'vs.id = svs.id_kind_of_sport')
            ->groupBy('s.id');

        // Фильтрация по количеству видов спорта
        if ($sportCount !== null && $sportCount !== '') {
            $query->having('COUNT(svs.id_kind_of_sport) = :sportCount', [':sportCount' => $sportCount]);
        }

        // Получаем данные спортсменов
        $sportsmenData = $query->orderBy('sport_count DESC')->all(); // Сортировка по количеству видов спорта

        return $this->render('index', [
            'model' => $model, // Передаем модель в представление
            'sportsmenData' => $sportsmenData,
        ]);
    }
}
