<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SportsClub;
use app\models\SearchForm;

class SportsClubController extends Controller
{
    public function actionIndex()
    {
        $model = new SearchForm();
        $dataProvider = [];

        // Проверка запроса GET для отображения всех записей
        if (Yii::$app->request->isGet) {
            $dataProvider = SportsClub::find()
                ->select(['sports_club.name AS club_name', 'COUNT(sportsman.id) AS athlete_count'])
                ->innerJoin('sportsman', 'sportsman.id_sports_club = sports_club.id')
                ->groupBy('sports_club.id') // Группируем по id клуба
                ->asArray() // Используем asArray для возврата массивов
                ->all();
        }

        // Обработка формы поиска
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $dataProvider = SportsClub::find()
                ->select(['sports_club.name AS club_name', 'COUNT(sportsman.id) AS athlete_count'])
                ->innerJoin('sportsman', 'sportsman.id_sports_club = sports_club.id')
                ->innerJoin('sportsman_competitions', 'sportsman_competitions.id_sportsman = sportsman.id')
                ->innerJoin('competitions', 'competitions.id = sportsman_competitions.id_competitions')
                ->where(['between', 'competitions.event_date', $model->start_date, $model->end_date])
                ->groupBy('sports_club.id') // Группируем по id клуба
                ->asArray() // Используем asArray для возврата массивов
                ->all();
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
