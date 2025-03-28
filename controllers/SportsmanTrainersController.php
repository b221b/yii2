<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsman;
use app\models\Trainers;
use app\models\SportsmenTrenersSearch;

class SportsmanTrainersController extends Controller
{
    public function actionIndex()
    {
        // Динамическая модель для валидации
        $model = new SportsmenTrenersSearch(); // Используем новый класс для валидации

        // Получаем всех тренеров для выпадающего списка
        $treners = Trainers::find()->select(['id', 'name'])->asArray()->all();
        $trenerOptions = array_column($treners, 'name', 'id');

        // Получаем всех спортсменов по умолчанию
        $dataProvider = Sportsman::find()->all();

        // Обработка формы
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $query = Sportsman::find()
                ->innerJoin('sportsman_trainers', 'sportsman_trainers.id_sportsman = sportsman.id')
                ->leftJoin('trainers', 'trainers.id = sportsman_trainers.id_trainers')
                ->select(['sportsman.*', 'trainers.name as trener_name'])
                ->where(['sportsman_trainers.id_trainers' => $model->trener_id]); 

            if (!empty($model->discharge)) {
                $query->andWhere(['=', 'discharge', $model->discharge]);
            }

            $dataProvider = $query->all();
        }

        return $this->render('index', [
            'model' => $model,
            'trenerOptions' => $trenerOptions,
            'dataProvider' => $dataProvider,
        ]);
    }
}
