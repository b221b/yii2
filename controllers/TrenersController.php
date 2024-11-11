<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Treners;
use app\models\VidSporta;
use app\models\TrenersVidSportaSearch;

class TrenersController extends Controller
{
    public function actionIndex()
    {
        $model = new TrenersVidSportaSearch();
        $dataProvider = [];

        // Получаем всех тренеров и их виды спорта
        $query = Treners::find()
            ->select(['t.name AS trainer_name', 'vs.name AS sport_name'])
            ->alias('t')
            ->leftJoin('vid_sporta vs', 'vs.id = t.id_vid_sporta'); // Изменили условие JOIN

        // Обработка формы поиска (если необходимо)
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Если выбран вид спорта, фильтруем по нему
            $query->andWhere(['vs.id' => $model->sport]); // Используем ID вида спорта
        }

        $dataProvider = $query->asArray()->all(); // Получаем данные

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'sports' => VidSporta::find()->select('name')->indexBy('id')->column(),
        ]);
    }
}
