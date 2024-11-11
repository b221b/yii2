<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SportsmenSearch;
use app\models\Structure;
use app\models\Sorevnovaniya;
use yii\data\ArrayDataProvider;

class SportController extends Controller
{
    public function actionIndex()
    {
        $model = new SportsmenSearch(); // Обратите внимание на использование правильной модели
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
                ->select(['s.name AS structure_name', 'ss.name AS sorevnovanie_name', 'ss.data_provedeniya']) // Добавлено поле name из sorevnovaniya
                ->from('structure s')
                ->innerJoin('sorevnovaniya ss', 'ss.id_structure = s.id')
                ->where(['between', 'ss.data_provedeniya', $startDate, $endDate]);

            $dataProvider->allModels = $query->all();
        } else {
            // Получаем все записи при первом запуске
            $query = (new \yii\db\Query())
                ->select(['s.name AS structure_name', 'ss.name AS sorevnovanie_name', 'ss.data_provedeniya']) // Добавлено поле name из sorevnovaniya
                ->from('structure s')
                ->innerJoin('sorevnovaniya ss', 'ss.id_structure = s.id');

            $dataProvider->allModels = $query->all();
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
