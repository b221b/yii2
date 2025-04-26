<?php

namespace app\controllers;

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
                    'ui.status'
                ])
                ->from('user u')
                ->leftJoin('user_info ui', 'ui.id_user = u.id')
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
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
