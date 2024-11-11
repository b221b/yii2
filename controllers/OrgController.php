<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\DateRangeForm;
use app\models\SportsmenSearch;
use app\models\Org;
use yii\data\ArrayDataProvider;

class OrgController extends Controller
{
    public function actionIndex()
    {
        $model = new SportsmenSearch();
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
                ->select(['o.fio', 'GROUP_CONCAT(s.name SEPARATOR ", ") AS names', 'COUNT(s.id) AS count'])
                ->from('org o')
                ->innerJoin('org_sorevnovaniya os', 'os.id_org = o.id')
                ->innerJoin('sorevnovaniya s', 's.id = os.id_sorevnovaniya')
                ->where(['between', 's.data_provedeniya', $startDate, $endDate])
                ->groupBy('o.fio'); // Группируем только по fio

            $dataProvider->allModels = $query->all();
        } else {
            // Если форма не отправлена, получаем все записи
            $query = (new \yii\db\Query())
                ->select(['o.fio', 'GROUP_CONCAT(s.name SEPARATOR ", ") AS names', 'COUNT(s.id) AS count'])
                ->from('org o')
                ->innerJoin('org_sorevnovaniya os', 'os.id_org = o.id')
                ->innerJoin('sorevnovaniya s', 's.id = os.id_sorevnovaniya')
                ->groupBy('o.fio'); // Группируем только по fio

            $dataProvider->allModels = $query->all();
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
