<?php

namespace app\modules\admin\controllers;

use app\models\User;
use app\models\UserInfo;
use app\modules\admin\models\UserSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrenersController implements the CRUD actions for users model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all users models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = 7;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionStatus()
    {
        $users = User::find()
            ->with('userInfo') // Жадная загрузка
            ->all();

        return $this->render('user', ['users' => $users]);
    }

    public function actionChangeStatus($id, $status)
    {
        $userInfo = UserInfo::findOne($id);

        if ($userInfo) {
            $userInfo->status = (int)$status;
            if ($userInfo->save()) {
                Yii::$app->session->setFlash('success', 'Статус успешно обновлен');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при обновлении статуса');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Запись не найдена');
        }

        return $this->redirect(['status']);
    }

    /**
     * Displays a single users model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model && isset($_POST['User']['isAdmin'])) {
            $model->isAdmin = $_POST['User']['isAdmin'];
            $model->save(false); // false чтобы пропустить валидацию
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDetails($id)
    {
        Yii::info("Начало обработки запроса details для пользователя ID: $id");

        try {
            $user = User::find()
                ->where(['id' => $id])
                ->with(['userInfo', 'userInfo.sportsClub', 'userInfo.trainer', 'userInfo.kindOfSport'])
                ->one(); 

            Yii::debug('Данные пользователя: ' . print_r($user, true));

            if (!$user) {
                throw new NotFoundHttpException('Пользователь не найден');
            }

            return $this->renderPartial('_user_details', [
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            Yii::error("Ошибка в actionDetails: " . $e->getMessage());
            throw $e;
        }
    }
}
