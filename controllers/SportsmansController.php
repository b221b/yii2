<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsman;
use app\models\KindOfSport;

class SportsmansController extends Controller
{
    public function actionIndex()
    {
        $model = new Sportsman();
        $vidSportaList = KindOfSport::find()->all();

        // Получаем данные фильтров
        $searchParams = Yii::$app->request->post();

        $dataProvider = $model->search($searchParams);

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'vidSportaList' => $vidSportaList,
        ]);
    }
}