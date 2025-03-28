<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\DateRangeForm;
use app\models\SportsmenSearch;
use app\models\Organisations;
use app\models\SportsmanSearch;
use yii\data\ArrayDataProvider;

class OrganisationsController extends Controller
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
                ->select(['o.full_name', 'GROUP_CONCAT(s.name SEPARATOR ", ") AS names', 'COUNT(s.id) AS count'])
                ->from('organisations o')
                ->innerJoin('organisations_competitions os', 'os.id_organisations = o.id')
                ->innerJoin('competitions s', 's.id = os.id_competitions')
                ->where(['between', 's.event_date', $startDate, $endDate])
                ->groupBy('o.full_name'); 

            $dataProvider->allModels = $query->all();
        } else {
            // Если форма не отправлена, получаем все записи
            $query = (new \yii\db\Query())
                ->select(['o.full_name', 'GROUP_CONCAT(s.name SEPARATOR ", ") AS names', 'COUNT(s.id) AS count'])
                ->from('organisations o')
                ->innerJoin('organisations_competitions os', 'os.id_organisations = o.id')
                ->innerJoin('competitions s', 's.id = os.id_competitions')
                ->groupBy('o.full_name'); 

            $dataProvider->allModels = $query->all();
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
