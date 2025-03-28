<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsman;
use app\models\Competitions;
use app\models\SportsmanSearch;

class SportsmanCompetitionsController extends Controller
{
    public function actionIndex()
    {
        $model = new SportsmanSearch();
        $dataProvider = [];

        // Получаем всех спортсменов, если форма не отправлена
        $query = Sportsman::find()->select(['sportsman.name AS sportsman_name']);

        // Обработка формы поиска
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $startDate = $model->start_date;
            $endDate = $model->end_date;

            // Проверяем наличие соревнований в указанный период
            $competitions = Competitions::find()
                ->where(['between', 'event_date', $startDate, $endDate])
                ->all();

            if (empty($competitions)) {
                Yii::$app->session->setFlash('error', 'Нет соревнований в указанный период.');
            } else {
                // Получаем ID соревнований
                $competitionIds = array_column($competitions, 'id');

                // Получаем спортсменов, не участвовавших в соревнованиях
                $dataProvider = Sportsman::find()
                    ->where(['NOT IN', 'id', (new \yii\db\Query())
                        ->select('id_sportsman')
                        ->from('sportsman_competitions')
                        ->where(['id_competitions' => $competitionIds])])
                    ->asArray()
                    ->all();
            }
        } else {
            // Если форма не отправлена, выводим всех спортсменов
            $dataProvider = Sportsman::find()->asArray()->all();
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
