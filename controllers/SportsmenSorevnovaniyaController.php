<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sportsmen;
use app\models\Sorevnovaniya;
use app\models\SportsmenSearch;

class SportsmenSorevnovaniyaController extends Controller
{
    public function actionIndex()
    {
        $model = new SportsmenSearch();
        $dataProvider = [];

        // Получаем всех спортсменов, если форма не отправлена
        $query = Sportsmen::find()->select(['sportsmen.name AS sportsman_name']);

        // Обработка формы поиска
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $startDate = $model->start_date;
            $endDate = $model->end_date;

            // Проверяем наличие соревнований в указанный период
            $competitions = Sorevnovaniya::find()
                ->where(['between', 'data_provedeniya', $startDate, $endDate])
                ->all();

            if (empty($competitions)) {
                Yii::$app->session->setFlash('error', 'Нет соревнований в указанный период.');
            } else {
                // Получаем ID соревнований
                $competitionIds = array_column($competitions, 'id');

                // Получаем спортсменов, не участвовавших в соревнованиях
                $dataProvider = Sportsmen::find()
                    ->where(['NOT IN', 'id', (new \yii\db\Query())
                        ->select('id_sportsmen')
                        ->from('sportsmen_sorevnovaniya')
                        ->where(['id_sorevnovaniya' => $competitionIds])])
                    ->asArray()
                    ->all();
            }
        } else {
            // Если форма не отправлена, выводим всех спортсменов
            $dataProvider = Sportsmen::find()->asArray()->all();
        }

        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
