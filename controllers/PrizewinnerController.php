<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Competitions;
use app\models\PrizewinnerSearch;
use yii\data\ActiveDataProvider;

class PrizewinnerController extends Controller
{
    public function actionIndex()
    {
        $model = new PrizewinnerSearch(); // Используем новый класс для валидации

        // Получаем список всех соревнований для выпадающего списка
        $sorevnovaniya = Competitions::find()->all();
        $prizers = [];

        // Получаем всех призеров при первой загрузке страницы
        $prizers = (new \yii\db\Query())
            ->select(['s.name AS sportsman_name', 'ss.name AS sorevnovanie_name', 'p.prize_place', 'p.reward'])
            ->from('prizewinner p')
            ->innerJoin('sportsman_prizewinner sp', 'sp.id_prizewinner = p.id')
            ->innerJoin('sportsman s', 's.id = sp.id_sportsman')
            ->innerJoin('competitions ss', 'ss.id = sp.id_competitions') // Изменяем связь на правильную
            ->andWhere(['<=', 'p.prize_place', 3])
            ->all();

        // Обработка формы для фильтрации по соревнованию
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $sorevnovanie_id = $model->sorevnovanie_id;

            $prizers = (new \yii\db\Query())
                ->select(['s.name AS sportsman_name', 'ss.name AS sorevnovanie_name', 'p.prize_place', 'p.reward'])
                ->from('prizewinner p')
                ->innerJoin('sportsman_prizewinner sp', 'sp.id_prizewinner = p.id')
                ->innerJoin('sportsman s', 's.id = sp.id_sportsman')
                ->innerJoin('competitions ss', 'ss.id = sp.id_sorevnovaniya') // Изменяем связь на правильную
                ->where(['ss.id' => $sorevnovanie_id]) // Фильтрация по ID соревнования
                ->andWhere(['<=', 'p.prize_place', 3])
                ->all();
        }

        return $this->render('index', [
            'model' => $model,
            'sorevnovaniya' => $sorevnovaniya,
            'prizers' => $prizers,
        ]);
    }
}
