<?php

namespace app\controllers;

use app\models\KindOfSport;
use app\models\SportsClub;
use app\models\Trainers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\User;
use app\models\UserInfo;
use yii\data\ArrayDataProvider;

class UserController extends Controller
{
    public function actionIndex()
    {
        $currentUser = Yii::$app->user->identity;
        $usersDataProvider = null;

        if ($currentUser) {
            $userData = (new \yii\db\Query())
                ->select([
                    'u.id',
                    'u.username',
                    'ui.id as info_id',
                    'ui.phone_number',
                    'ui.email',
                    'ui.birthday',
                    'ui.gender',
                    'ui.id_sports_club',
                    'ui.id_trainers',
                    'ui.id_kind_of_sport',
                    'ui.status',
                    't.name as trainer_name', // имя тренера
                    'sc.name as club_name',   // название клуба
                    'kos.name as sport_name'  // название вида спорта
                ])
                ->from('user u')
                ->leftJoin('user_info ui', 'ui.id_user = u.id')
                ->leftJoin('trainers t', 't.id = ui.id_trainers')
                ->leftJoin('sports_club sc', 'sc.id = ui.id_sports_club')
                ->leftJoin('kind_of_sport kos', 'kos.id = ui.id_kind_of_sport')
                ->where(['u.id' => $currentUser->id])
                ->all();

            $usersDataProvider = new ArrayDataProvider([
                'allModels' => $userData,
                'pagination' => false,
            ]);
        }

        return $this->render('index', [
            'usersDataProvider' => $usersDataProvider,
        ]);
    }

    public function actionRequestLicense($id)
    {
        $userInfo = UserInfo::findOne($id);

        if (!$userInfo) {
            Yii::$app->session->setFlash('error', 'Запись не найдена');
            return $this->redirect(['index']);
        }

        // Проверяем заполненность всех обязательных полей
        $requiredFields = [
            'phone_number' => 'Телефон',
            'email' => 'Email',
            'birthday' => 'Дата рождения',
            'gender' => 'Пол',
            'id_sports_club' => 'Спортивный клуб',
            'id_trainers' => 'Тренер',
            'id_kind_of_sport' => 'Вид спорта'
        ];

        $missingFields = [];
        foreach ($requiredFields as $field => $name) {
            if (empty($userInfo->$field)) {
                $missingFields[] = $name;
            }
        }

        if (!empty($missingFields)) {
            Yii::$app->session->setFlash(
                'error',
                'Не все обязательные поля заполнены. Пожалуйста, заполните: ' . implode(', ', $missingFields)
            );
            return $this->redirect(['index']);
        }

        // Если все поля заполнены, меняем статус
        $userInfo->status = 2; // Устанавливаем статус "На рассмотрении"
        if ($userInfo->save()) {
            Yii::$app->session->setFlash('success', 'Заявка на лицензию успешно подана. Статус изменен на "На рассмотрении".');
        } else {
            Yii::$app->session->setFlash('error', 'Ошибка при подаче заявки на лицензию.');
        }

        return $this->redirect(['index']);
    }

    public function actionCreate($user_id)
    {
        $model = new UserInfo();
        $model->id_user = $user_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = UserInfo::findOne($id);

        // Получение данных для выпадающих списков
        $sportsClubs = SportsClub::find()->select(['name', 'id'])->indexBy('id')->column();
        $trainers = Trainers::find()->select(['name', 'id'])->indexBy('id')->column();
        $sportsKinds = KindOfSport::find()->select(['name', 'id'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'sportsClub' => $sportsClubs,  // Передача массива клубов в представление
            'trainer' => $trainers,         // Передача массива тренеров в представление
            'sportsKind' => $sportsKinds,   // Передача массива видов спорта в представление
        ]);
    }


    public function actionDelete($id)
    {
        $model = UserInfo::findOne($id);

        if ($model !== null) {
            $model->delete();
            Yii::$app->session->setFlash('success', 'Контакт успешно удален.');
        } else {
            Yii::$app->session->setFlash('error', 'Контакт не найден.');
        }

        return $this->redirect(['index']);
    }

    protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
