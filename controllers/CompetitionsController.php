<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Competitions;

class CompetitionsController extends Controller
{
    public function actionIndex()
    {
        // Получаем данные через модель (с автоматическим кешированием)
        $sorevnovaniya = Competitions::getCachedCompetitions();

        return $this->render('index', [
            'sorevnovaniya' => $sorevnovaniya,
        ]);
    }
}