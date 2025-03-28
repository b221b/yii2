<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Competitions;
use yii\data\ActiveDataProvider;
use app\models\Organisations;
use app\models\CompetitionOrganisationSearch;

class CompetitionOrganisationController extends Controller
{
    public function actionIndex()
    {
        $model = new CompetitionOrganisationSearch();

        $query = Competitions::find()->joinWith('organisationsCompetitions.organisations');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Преобразуем даты в нужный формат для фильтрации
            $startDate = $model->startDate;
            $endDate = $model->endDate;

            // Проверяем, указаны ли обе даты
            if ($startDate && $endDate) {
                $query->andFilterWhere(['between', 'competitions.event_date', $startDate, $endDate]);
            }

            // Проверяем, указан ли организатор
            if ($model->full_name) {
                $query->andFilterWhere(['organisations.id' => $model->full_name]);
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Получаем список организаторов для выпадающего списка
        $orgs = Organisations::find()->select(['full_name', 'id'])->indexBy('id')->column();

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'orgs' => $orgs,
        ]);
    }
}
