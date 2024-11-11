<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsmen;
use app\models\VidSporta;
use app\models\SportsmenVidSporta;
use yii\data\ActiveDataProvider;

class SportsmensController extends Controller
{
    public function actionIndex()
    {
        $model = new Sportsmen();

        // Изначально получаем всех спортсменов
        $query = Sportsmen::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Получаем все виды спорта для выпадающего списка
        $vidSportaList = VidSporta::find()->all();

        // Обработка формы
        if ($model->load(Yii::$app->request->post())) {
            // Если разряд указан, добавляем условие
            if (!empty($model->razryad)) {
                $query->andWhere(['=', 'razryad', $model->razryad]);
            }

            // Если выбран вид спорта, добавляем условие
            if (!empty($model->id_vid_sporta)) {
                $query->innerJoin('sportsmen_vidSporta', 'sportsmen.id = sportsmen_vidSporta.id_sportsmen')
                    ->andWhere(['sportsmen_vidSporta.id_vid_sporta' => $model->id_vid_sporta]);
            }
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'vidSportaList' => $vidSportaList,
        ]);
    }
}
