<?php

namespace app\controllers;

use Yii;
use app\models\Competitions;
use app\models\Structure;
use app\models\KindOfSport;
use yii\web\Controller;

class CompetitionsStructureController extends Controller
{
    public function actionIndex()
    {
        $structures = Structure::getList();
        $vidSportas = KindOfSport::find()->select(['name', 'id'])->indexBy('id')->column();

        // Используем модель Sorevnovaniya для валидации
        $model = new Competitions();

        $query = Competitions::find()
            ->joinWith(['structure', 'kindOfSport']);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->id_structure) {
                $query->andWhere(['competitions.id_structure' => $model->id_structure]);
            }
            if ($model->id_kind_of_sport) {
                $query->andWhere(['competitions.id_kind_of_sport' => $model->id_kind_of_sport]);
            }
        }

        $competitions = $query->all();

        return $this->render('index', [
            'competitions' => $competitions,
            'structures' => $structures,
            'vidSportas' => $vidSportas,
            'model' => $model,
        ]);
    }
}
