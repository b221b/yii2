<?php

namespace app\controllers;

use Yii;
use app\models\Sorevnovaniya;
use app\models\SorevnovaniyaSearch;
use app\models\Structure;
use app\models\VidSporta;
use yii\web\Controller;

class SorevnovaniyaStructureController extends Controller
{
    public function actionIndex()
    {
        $structures = Structure::getList();
        $vidSportas = VidSporta::find()->select(['name', 'id'])->indexBy('id')->column();

        // Используем модель Sorevnovaniya для валидации
        $model = new SorevnovaniyaSearch();

        $query = Sorevnovaniya::find()
            ->joinWith(['structure', 'vidSporta']);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->id_structure) {
                $query->andWhere(['sorevnovaniya.id_structure' => $model->id_structure]);
            }
            if ($model->id_vid_sporta) {
                $query->andWhere(['sorevnovaniya.id_vid_sporta' => $model->id_vid_sporta]);
            }
        }

        $sorevnovaniya = $query->all();

        return $this->render('index', [
            'sorevnovaniya' => $sorevnovaniya,
            'structures' => $structures,
            'vidSportas' => $vidSportas,
            'model' => $model,
        ]);
    }
}
