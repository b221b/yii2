<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsmen;
use app\models\Treners;
use app\models\SportsmenTrenersSearch; // Подключаем новый класс

class SportsmenTrenersController extends Controller
{
    public function actionIndex()
    {
        // Динамическая модель для валидации
        $model = new SportsmenTrenersSearch(); // Используем новый класс для валидации

        // Получаем всех тренеров для выпадающего списка
        $treners = Treners::find()->select(['id', 'name'])->asArray()->all();
        $trenerOptions = array_column($treners, 'name', 'id');

        // Получаем всех спортсменов по умолчанию
        $dataProvider = Sportsmen::find()->all();

        // Обработка формы
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $query = Sportsmen::find()
                ->innerJoin('sportsmen_treners', 'sportsmen_treners.id_sportsmen = sportsmen.id')
                ->leftJoin('treners', 'treners.id = sportsmen_treners.id_treners')
                ->select(['sportsmen.*', 'treners.name as trener_name'])
                ->where(['sportsmen_treners.id_treners' => $model->trener_id]);

            if (!empty($model->razryad)) {
                $query->andWhere(['=', 'razryad', $model->razryad]);
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
