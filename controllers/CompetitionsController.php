<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Competitions;
use app\models\KindOfSport;
use app\models\Structure;
use Yii;

class CompetitionsController extends Controller
{
    public function actionIndex()
    {
        $model = new Competitions(); // Используем основную модель

        $query = Competitions::find()
            ->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman'])
            ->orderBy('name');

        // Фильтрация через параметры GET
        $searchParams = Yii::$app->request->get('Competitions');
        if ($searchParams) {
            if (!empty($searchParams['name'])) {
                $query->andFilterWhere(['like', 'name', $searchParams['name']]);
            }
            if (!empty($searchParams['event_date'])) {
                $query->andFilterWhere(['event_date' => $searchParams['event_date']]);
            }
            if (!empty($searchParams['id_structure'])) {
                $query->andFilterWhere(['id_structure' => $searchParams['id_structure']]);
            }
            if (!empty($searchParams['id_kind_of_sport'])) {
                $query->andFilterWhere(['id_kind_of_sport' => $searchParams['id_kind_of_sport']]);
            }

            // Загружаем параметры в модель для отображения в форме
            $model->attributes = $searchParams;
        }

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
            'pageSizeParam' => false,
        ]);

        $sorevnovaniya = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'sorevnovaniya' => $sorevnovaniya,
            'pagination' => $pagination,
            'model' => $model,
            'structures' => Structure::find()->all(),
            'kindsOfSport' => KindOfSport::find()->all(),
        ]);
    }
}
