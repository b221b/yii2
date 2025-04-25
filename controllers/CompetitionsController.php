<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Competitions;

class CompetitionsController extends Controller
{
    public function actionIndex()
    {
        // Получаем все записи (без кеширования для пагинации)
        $query = Competitions::find()
            ->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman'])
            ->orderBy('name');

        // Создаем объект пагинации
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10, // Количество элементов на странице
            'pageSizeParam' => false, // Убираем параметр per-page из URL
        ]);

        // Получаем данные для текущей страницы
        $sorevnovaniya = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'sorevnovaniya' => $sorevnovaniya,
            'pagination' => $pagination, // Передаем объект пагинации
        ]);
    }
}
