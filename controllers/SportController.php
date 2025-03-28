<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SportsmanSearch;
use app\models\Structure;
use app\models\Competitions;
use yii\data\ArrayDataProvider;

class SportController extends Controller
{
    public function actionIndex()
    {
        $model = new SportsmanSearch();
        $dataProvider = new ArrayDataProvider([
            'allModels' => [],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $startDate = $model->start_date;
            $endDate = $model->end_date;

            $query = (new \yii\db\Query())
                ->select(['s.name AS structure_name', 'ss.name AS competitions_name', 'ss.event_date'])
                ->from('structure s')
                ->innerJoin('competitions ss', 'ss.id_structure = s.id')
                ->where(['between', 'ss.event_date', $startDate, $endDate]);

            $dataProvider->allModels = $query->all();
        } else {
            // Получаем все записи при первом запуске
            $query = (new \yii\db\Query())
                ->select(['s.name AS structure_name', 'ss.name AS competitions_name', 'ss.event_date']) 
                ->from('structure s')
                ->innerJoin('competitions ss', 'ss.id_structure = s.id');

            $dataProvider->allModels = $query->all();
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
