<?php

namespace app\controllers;

use Yii;
use app\models\CompetitionApplications;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class CompetitionApplicationsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['@'], // Любой авторизованный пользователь
                    ],
                    [
                        'allow' => true,
                        'actions' => ['approve', 'reject'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->status_id == User::ROLE_MANAGER;
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'approve' => ['post'],
                    'reject' => ['post'],
                ],
            ],
        ];
    }

    public function actionCreate($competition_id)
    {
        $model = new CompetitionApplications();
        $model->user_id = Yii::$app->user->id;
        $model->competition_id = $competition_id;

        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Ваша заявка успешно подана и ожидает рассмотрения.');
        } else {
            Yii::$app->session->setFlash('error', 'Произошла ошибка при подаче заявки.');
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        if ($model->approve()) {
            Yii::$app->session->setFlash('success', 'Заявка успешно одобрена и пользователь зарегистрирован на соревнование.');
        } else {
            Yii::$app->session->setFlash('error', 'Произошла ошибка при одобрении заявки.');
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionReject($id)
    {
        $model = $this->findModel($id);
        $model->status = CompetitionApplications::STATUS_REJECTED;

        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'Заявка успешно отклонена.');
            // Здесь можно добавить логику уведомления пользователя
        } else {
            Yii::$app->session->setFlash('error', 'Произошла ошибка при отклонении заявки.');
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    protected function findModel($id)
    {
        if (($model = CompetitionApplications::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
