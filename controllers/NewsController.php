<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Competitions;
use app\models\KindOfSport;
use app\models\Structure;
use Yii;

class NewsController extends Controller
{
    public function actionIndex()
    {
        $model = new Competitions();
        $query = Competitions::find()
            ->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman'])
            ->orderBy(['event_date' => SORT_DESC]); // Сортировка по дате (новые сначала)

        // Массив для хранения активных фильтров
        $activeFilters = [];

        $searchParams = Yii::$app->request->get('Competitions');
        if ($searchParams) {
            if (!empty($searchParams['event_date'])) {
                $query->andFilterWhere(['event_date' => $searchParams['event_date']]);
                $activeFilters[] = 'event_date';
            }
            if (!empty($searchParams['id_structure'])) {
                $query->andFilterWhere(['id_structure' => $searchParams['id_structure']]);
                $activeFilters[] = 'id_structure';
            }
            if (!empty($searchParams['id_kind_of_sport'])) {
                $query->andFilterWhere(['id_kind_of_sport' => $searchParams['id_kind_of_sport']]);
                $activeFilters[] = 'id_kind_of_sport';
            }
            if (!empty($searchParams['name'])) {
                $query->andFilterWhere(['like', 'name', $searchParams['name']]);
                $activeFilters[] = 'name';
            }

            $model->attributes = $searchParams;
        }

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 9, // Уменьшил для сетки 3x3
            'pageSizeParam' => false,
        ]);

        $competitions = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'competitions' => $competitions,
            'pagination' => $pagination,
            'model' => $model,
            'structures' => Structure::find()->all(),
            'kindsOfSport' => KindOfSport::find()->all(),
            'activeFilters' => $activeFilters,
        ]);
    }

    public function actionView($id)
    {
        $model = Competitions::find()
            ->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman'])
            ->where(['id' => $id])
            ->one();

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Соревнование не найдено.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
