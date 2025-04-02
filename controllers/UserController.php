<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use yii\data\ArrayDataProvider;

class UserController extends Controller
{
    public function actionIndex()
    {
        $model = new User();
        $selectedUserId = null;
        $usersDataProvider = null;

        $currentUser = Yii::$app->user->identity;

        if ($currentUser) {
            $userData = (new \yii\db\Query())
                ->select(['u.username', 'ui.phone_number', 'ui.email'])
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
            'model' => $model,
            'usersDataProvider' => $usersDataProvider,
            'selectedUserId' => $selectedUserId,
        ]);
    }
}
