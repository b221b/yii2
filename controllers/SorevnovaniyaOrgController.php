<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sorevnovaniya;
use yii\data\ActiveDataProvider;
use app\models\Org;
use app\models\SorevnovaniyaOrgSearch;

class SorevnovaniyaOrgController extends Controller
{
    public function actionIndex()
    {
        $model = new SorevnovaniyaOrgSearch();

        $query = Sorevnovaniya::find()->joinWith('orgSorevnovaniyas.org');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Преобразуем даты в нужный формат для фильтрации
            $startDate = $model->startDate;
            $endDate = $model->endDate;

            // Проверяем, указаны ли обе даты
            if ($startDate && $endDate) {
                $query->andFilterWhere(['between', 'sorevnovaniya.data_provedeniya', $startDate, $endDate]);
            }

            // Проверяем, указан ли организатор
            if ($model->fio) {
                $query->andFilterWhere(['org.id' => $model->fio]);
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Получаем список организаторов для выпадающего списка
        $orgs = Org::find()->select(['fio', 'id'])->indexBy('id')->column();

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'orgs' => $orgs,
        ]);
    }
}
