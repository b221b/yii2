<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Sportsmen;

class SportsmenController extends Controller
{
    public function actionIndex()
    {
        $query = Sportsmen::find();
        // $pagination = new Pagination([
        //     'defaultPageSize' => 5,
        //     'totalCount' => $query->count(),
        // ]);
        $sportsmen = $query->orderBy('name')
            // ->offset($pagination->offset)
            // ->limit($pagination->limit)
            ->all();
        return $this->render('index', [
            'sportsmen' => $sportsmen,
            // 'pagination' => $pagination,
        ]);
    }
}
