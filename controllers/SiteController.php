<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegistrationForm;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // mailer
        // $result = Yii::$app->mailer->compose()
        //         ->setFrom(['titarenkomiroslav5@gmail.com' => 'Письмо с сайта'])
        //         ->setTo('titarenkomiroslav5@gmail.com')
        //         ->setSubject('Тема сообщения')
        //         ->setTextBody('Текст сообщения')
        //         ->send();

        //     var_dump($result); // выведет true/false

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new RegistrationForm();

        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            // Регистрация прошла успешно
            Yii::$app->session->setFlash('success', 'Thank you for registering. You can now log in.');
            return $this->redirect(['site/login']);
        }

        return $this->render('registration', [
            'model' => $model,
        ]);
    }

    public function actionTableData()
    {
        $tableName = Yii::$app->request->get('table');
        $forbiddenTables = ['user', 'competitions', 'user_info', 'migration', 'organisations_competitions', 'sportsman_competitions', 'sportsman_kind_of_sport', 'sportsman_prizewinner', 'sportsman_trainers'];

        // Проверяем доступ
        if (Yii::$app->user->isGuest || !Yii::$app->user->identity->isAdmin) {
            if (in_array($tableName, $forbiddenTables)) {
                throw new \yii\web\ForbiddenHttpException('Доступ к этой таблице запрещён.');
            }
        }

        if (!$tableName || !in_array($tableName, Yii::$app->db->schema->getTableNames())) {
            throw new NotFoundHttpException('Таблица не найдена.');
        }

        $query = (new \yii\db\Query())->from($tableName);

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('tableData', [
            'dataProvider' => $dataProvider,
            'tableName' => $tableName,
        ]);
    }
}
