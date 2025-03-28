<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Competitions;

class CompetitionsController extends Controller
{
    public function actionIndex()
    {
        $query = Competitions::find()
            ->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman']);

        $sorevnovaniya = $query->orderBy('name')->all();

        return $this->render('index', [
            'sorevnovaniya' => $sorevnovaniya,
        ]);
    }
}
