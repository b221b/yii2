<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SportClub;
use app\models\SearchForm;

class SportClubController extends Controller
{
    public function actionIndex()
    {
        $model = new SearchForm();
        $dataProvider = [];

        // Проверка запроса GET для отображения всех записей
        if (Yii::$app->request->isGet) {
            $dataProvider = SportClub::find()
                ->select(['sport_club.name AS club_name', 'COUNT(sportsmen.id) AS athlete_count'])
                ->innerJoin('sportsmen', 'sportsmen.id_sport_club = sport_club.id')
                ->groupBy('sport_club.id') // Группируем по id клуба
                ->asArray() // Используем asArray для возврата массивов
                ->all();
        }

        // Обработка формы поиска
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $dataProvider = SportClub::find()
                ->select(['sport_club.name AS club_name', 'COUNT(sportsmen.id) AS athlete_count'])
                ->innerJoin('sportsmen', 'sportsmen.id_sport_club = sport_club.id')
                ->innerJoin('sportsmen_sorevnovaniya', 'sportsmen_sorevnovaniya.id_sportsmen = sportsmen.id')
                ->innerJoin('sorevnovaniya', 'sorevnovaniya.id = sportsmen_sorevnovaniya.id_sorevnovaniya')
                ->where(['between', 'sorevnovaniya.data_provedeniya', $model->start_date, $model->end_date])
                ->groupBy('sport_club.id') // Группируем по id клуба
                ->asArray() // Используем asArray для возврата массивов
                ->all();
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
