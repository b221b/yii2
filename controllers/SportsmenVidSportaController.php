<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsmen;

class SportsmenVidSportaController extends Controller
{
    public function actionIndex()
    {
        $model = new Sportsmen(); // Создаем экземпляр модели
        $sportsmenData = [];
        $sportCount = Yii::$app->request->post('Sportsmen')['sport_count'] ?? null; // Получаем значение из запроса

        // Получаем данные спортсменов по умолчанию
        $query = (new \yii\db\Query())
            ->select(['s.name AS sportsman_name', 'GROUP_CONCAT(vs.name SEPARATOR ", ") AS sports', 'COUNT(svs.id_vid_sporta) AS sport_count'])
            ->from('sportsmen s')
            ->innerJoin('sportsmen_vidSporta svs', 'svs.id_sportsmen = s.id')
            ->innerJoin('vid_sporta vs', 'vs.id = svs.id_vid_sporta')
            ->groupBy('s.id');

        // Фильтрация по количеству видов спорта
        if ($sportCount !== null && $sportCount !== '') {
            $query->having('COUNT(svs.id_vid_sporta) = :sportCount', [':sportCount' => $sportCount]);
        }

        // Получаем данные спортсменов
        $sportsmenData = $query->orderBy('sport_count DESC')->all(); // Сортировка по количеству видов спорта

        return $this->render('index', [
            'model' => $model, // Передаем модель в представление
            'sportsmenData' => $sportsmenData,
        ]);
    }
}
