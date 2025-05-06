<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\CompetitionNews;
use app\models\KindOfSport;
use yii\data\ActiveDataProvider;

class NewssController extends Controller
{
    public function actionIndex($sport = null)
    {
        $query = CompetitionNews::find()->orderBy('event_date DESC');

        if ($sport) {
            $query->andWhere(['id_kind_of_sport' => $sport]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'sports' => KindOfSport::find()->all(),
        ]);
    }

    public function actionView($id)
    {
        $model = CompetitionNews::findOne($id);

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Событие не найдено.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
