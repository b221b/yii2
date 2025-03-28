<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsman;
use app\models\KindOfSport;
use app\models\SportsmanKindOfSport;
use yii\data\ActiveDataProvider;

class SportsmansController extends Controller
{
    public function actionIndex()
    {
        $model = new Sportsman();

        // Изначально получаем всех спортсменов
        $query = Sportsman::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Получаем все виды спорта для выпадающего списка
        $vidSportaList = KindOfSport::find()->all();

        // Обработка формы
        if ($model->load(Yii::$app->request->post())) {
            // Если разряд указан, добавляем условие
            if (!empty($model->discharge)) {
                $query->andWhere(['=', 'discharge', $model->discharge]);
            }

            // Если выбран вид спорта, добавляем условие
            if (!empty($model->id_kind_of_sport)) {
                $query->innerJoin('sportsman_kind_of_sport', 'sportsman.id = sportsman_kind_of_sport.id_sportsman')
                    ->andWhere(['sportsman_kind_of_sport.id_kind_of_sport' => $model->id_kind_of_sport]);
            }
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'vidSportaList' => $vidSportaList,
        ]);
    }
}
