<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsmen;
use app\models\Treners;
use app\models\SportsmenTreners;
use yii\data\ArrayDataProvider;

class TrenersSportsmensController extends Controller
{
    public function actionIndex()
    {
        $model = new Sportsmen();
        $selectedSportsmanId = null;
        $trenersDataProvider = null;

        // Получаем всех спортсменов для выпадающего списка
        $sportsmenList = Sportsmen::find()->all();

        // Запрос на получение всех тренеров
        $allTrenersData = (new \yii\db\Query())
            ->select(['s.name AS sportsman_name', 'GROUP_CONCAT(t.name SEPARATOR ", ") AS treners_names'])
            ->from('sportsmen AS s')
            ->innerJoin('sportsmen_treners AS st', 's.id = st.id_sportsmen')
            ->innerJoin('treners AS t', 't.id = st.id_treners')
            ->groupBy('s.id')
            ->all();

        // Создаем DataProvider для отображения всех тренеров
        $trenersDataProvider = new ArrayDataProvider([
            'allModels' => $allTrenersData,
            'pagination' => false,
        ]);

        // Обработка формы
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $selectedSportsmanId = $model->id;

            // Запрос на получение тренеров для выбранного спортсмена
            $trenersData = (new \yii\db\Query())
                ->select(['GROUP_CONCAT(t.name SEPARATOR ", ") AS treners_names', 's.name AS sportsman_name'])
                ->from('sportsmen AS s')
                ->innerJoin('sportsmen_treners AS st', 's.id = st.id_sportsmen')
                ->innerJoin('treners AS t', 't.id = st.id_treners')
                ->where(['s.id' => $selectedSportsmanId])
                ->groupBy('s.id')
                ->all();

            // Создаем DataProvider для отображения тренеров
            $trenersDataProvider = new ArrayDataProvider([
                'allModels' => $trenersData,
                'pagination' => false,
            ]);
        }

        return $this->render('index', [
            'model' => $model,
            'sportsmenList' => $sportsmenList,
            'trenersDataProvider' => $trenersDataProvider,
            'selectedSportsmanId' => $selectedSportsmanId,
        ]);
    }
}
