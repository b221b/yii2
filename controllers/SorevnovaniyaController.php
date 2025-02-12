<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Sorevnovaniya;

class SorevnovaniyaController extends Controller
{
    public function actionIndex()
    {
        $query = Sorevnovaniya::find()
            ->with(['structure', 'vidSporta', 'sportsmenPrizers.sportsmen']); // Загрузка спортсменов через связь

        $sorevnovaniya = $query->orderBy('name')->all();

        return $this->render('index', [
            'sorevnovaniya' => $sorevnovaniya,
        ]);
    }
}
