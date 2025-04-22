<?php

namespace app\controllers;

use Yii;
use app\models\Competitions;
use app\models\SportsmanPrizewinner;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class CompetitionCRUDController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Competitions::find()->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman']),
            'pagination' => [
                'pageSize' => 7, 
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Competitions();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Сохранение связи спортсменов и призов
            $prizers = Yii::$app->request->post('prizer', []);

            // Проверка на дублирование спортсменов
            $sportsmanIds = array_filter($prizers); // Убираем пустые значения
            if (count($sportsmanIds) !== count(array_unique($sportsmanIds))) {
                $model->addError('prizer', 'Один и тот же спортсмен не может занимать несколько призовых мест.');

                return $this->render('create', [
                    'model' => $model,
                ]);
            }

            foreach ($prizers as $prizerId => $sportsmanId) {
                if ($sportsmanId) {
                    $sportsmenPrizer = new SportsmanPrizewinner();
                    $sportsmenPrizer->id_competitions = $model->id;
                    $sportsmenPrizer->id_prizewinner = $prizerId;
                    $sportsmenPrizer->id_sportsman = $sportsmanId;
                    $sportsmenPrizer->save();
                }
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Получаем существующих призеров
        $existingPrizers = SportsmanPrizewinner::find()->where(['id_competitions' => $model->id])->all();
        $existingPrizersMap = [];

        foreach ($existingPrizers as $prizer) {
            $existingPrizersMap[$prizer->id_prizewinner] = $prizer;
        }

        // Загружаем данные из POST запроса
        if ($model->load(Yii::$app->request->post())) {
            // Сначала проверяем, проходят ли данные валидацию
            if ($model->validate()) {
                // Сохраняем модель
                $model->save();

                // Обновление связи спортсменов и призов
                $prizers = Yii::$app->request->post('prizer', []);

                // Проверка на дублирование спортсменов
                $sportsmanIds = array_filter($prizers); // Убираем пустые значения
                if (count($sportsmanIds) !== count(array_unique($sportsmanIds))) {
                    $model->addError('prizer', 'Один и тот же спортсмен не может занимать несколько призовых мест.');
                    return $this->render('update', [
                        'model' => $model,
                        'existingPrizers' => $existingPrizersMap,
                    ]);
                }

                // Очистка старых записей
                SportsmanPrizewinner::deleteAll(['id_competitions' => $model->id]);
                foreach ($prizers as $prizerId => $sportsmanId) {
                    if ($sportsmanId) {
                        $sportsmenPrizer = new SportsmanPrizewinner();
                        $sportsmenPrizer->id_competitions = $model->id;
                        $sportsmenPrizer->id_prizewinner = $prizerId;
                        $sportsmenPrizer->id_sportsman = $sportsmanId;
                        $sportsmenPrizer->save();
                    }
                }
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Пожалуйста, исправьте ошибки в форме.');
            }
        }

        return $this->render('update', [
            'model' => $model,
            'existingPrizers' => $existingPrizersMap,
        ]);
    }

    public function actionDelete($id)
    {
        // Находим модель соревнования
        $model = $this->findModel($id);

        // Удаляем связанные записи из таблицы sportsmen_prizer
        SportsmanPrizewinner::deleteAll(['id_competitions' => $model->id]);

        // Удаляем запись из sorevnovaniya
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Competitions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
