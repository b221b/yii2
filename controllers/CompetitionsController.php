<?php

namespace app\controllers;

use app\models\CompetitionRegistration;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Competitions;
use app\models\KindOfSport;
use app\models\Structure;
use Yii;
use yii\web\NotFoundHttpException;

class CompetitionsController extends Controller
{
    public function actionIndex()
    {
        $model = new Competitions();
        $query = Competitions::find()
            ->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman']);

        // Массив для хранения активных фильтров
        $activeFilters = [];

        $searchParams = Yii::$app->request->get('Competitions');
        if ($searchParams) {
            if (!empty($searchParams['event_date'])) {
                $query->andFilterWhere(['event_date' => $searchParams['event_date']]);
                $activeFilters[] = 'event_date';
            }
            if (!empty($searchParams['id_structure'])) {
                $query->andFilterWhere(['id_structure' => $searchParams['id_structure']]);
                $activeFilters[] = 'id_structure';
            }
            if (!empty($searchParams['id_kind_of_sport'])) {
                $query->andFilterWhere(['id_kind_of_sport' => $searchParams['id_kind_of_sport']]);
                $activeFilters[] = 'id_kind_of_sport';
            }
            if (!empty($searchParams['name'])) {
                $query->andFilterWhere(['like', 'name', $searchParams['name']]);
                $activeFilters[] = 'name';
            }

            $model->attributes = $searchParams;
        }

        // Обработка фильтра по призерам
        $prizewinnerParams = Yii::$app->request->get('SportsmanPrizewinner');
        if (!empty($prizewinnerParams['id_sportsman'])) {
            $query->joinWith(['sportsmanPrizewinner'])
                ->andWhere(['sportsman_prizewinner.id_sportsman' => $prizewinnerParams['id_sportsman']]);
            $activeFilters[] = 'prizewinners';
        }

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
            'pageSizeParam' => false,
        ]);

        $sorevnovaniya = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'sorevnovaniya' => $sorevnovaniya,
            'pagination' => $pagination,
            'model' => $model,
            'structures' => Structure::find()->all(),
            'kindsOfSport' => KindOfSport::find()->all(),
            'activeFilters' => $activeFilters, // Передаем массив активных фильтров
        ]);
    }

    public function actionView($id)
    {
        $model = Competitions::find()
            ->with(['structure', 'kindOfSport', 'sportsmanPrizewinner.sportsman'])
            ->where(['id' => $id])
            ->one();

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Соревнование не найдено.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionByDate($date)
    {
        $competitions = Competitions::find()
            ->where(['event_date' => $date])
            ->all();

        return $this->render('by-date', [
            'competitions' => $competitions,
            'date' => $date,
        ]);
    }

    public function actionRegister($id)
    {
        $competition = $this->findModel($id);

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        // Проверяем, не записан ли уже пользователь
        $existingRegistration = CompetitionRegistration::find()
            ->where([
                'competition_id' => $id,
                'user_id' => Yii::$app->user->id
            ])
            ->one();

        if ($existingRegistration) {
            Yii::$app->session->setFlash('warning', 'Вы уже записаны на это соревнование.');
            return $this->redirect(['view', 'id' => $id]);
        }

        $registration = new CompetitionRegistration([
            'competition_id' => $id,
            'user_id' => Yii::$app->user->id,
            'registration_date' => date('Y-m-d H:i:s'),
        ]);

        if ($registration->save()) {
            Yii::$app->session->setFlash('success', 'Вы успешно записаны на соревнование!');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при записи на соревнование: ' .
                implode(' ', $registration->getFirstErrors()));
        }

        return $this->redirect(['view', 'id' => $id]);
    }

    public function actionUnregister($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $registration = CompetitionRegistration::find()
            ->where([
                'competition_id' => $id,
                'user_id' => Yii::$app->user->id
            ])
            ->one();

        if (!$registration) {
            throw new NotFoundHttpException('Запись на соревнование не найдена.');
        }

        if ($registration->delete()) {
            Yii::$app->session->setFlash('success', 'Запись на соревнование отменена.');
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось отменить запись.');
        }

        return $this->redirect(['/user/index']);
    }

    protected function findModel($id)
    {
        if (($model = Competitions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
