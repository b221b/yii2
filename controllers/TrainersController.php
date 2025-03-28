<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Trainers;
use app\models\KindOfSport;
use app\models\TrainersKindOfSportSearch;

class TrainersController extends Controller
{
    public function actionIndex()
    {
        $model = new TrainersKindOfSportSearch();
        $dataProvider = [];

        // Получаем всех тренеров и их виды спорта
        $query = Trainers::find()
            ->select(['t.name AS trainer_name', 'vs.name AS sport_name'])
            ->alias('t')
            ->leftJoin('kind_of_sport vs', 'vs.id = t.id_kind_of_sport');

        // Обработка формы поиска (если необходимо)
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Если выбран вид спорта, фильтруем по нему
            $query->andWhere(['vs.id' => $model->sport]); // Используем ID вида спорта
        }

        $dataProvider = $query->asArray()->all(); // Получаем данные

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'sports' => KindOfSport::find()->select('name')->indexBy('id')->column(),
        ]);
    }
}
