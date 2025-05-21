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
        if (Yii::$app->user->isGuest || !Yii::$app->user->identity->status_id == \app\models\User::ROLE_ADMIN) {
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

        // Получаем первичный ключ таблицы
        $tableSchema = Yii::$app->db->getTableSchema($tableName);
        $primaryKey = $tableSchema->primaryKey;
        $pkField = !empty($primaryKey) ? $primaryKey[0] : 'id';

        return $this->render('tableData', [
            'dataProvider' => $dataProvider,
            'tableName' => $tableName,
            'pkField' => $pkField,
        ]);
    }

    public function actionViewRecord($table)
    {
        $id = Yii::$app->request->get('id');
        if (!$id) {
            throw new NotFoundHttpException('Не указан ID записи.');
        }

        $tableSchema = Yii::$app->db->getTableSchema($table);
        $primaryKey = $tableSchema->primaryKey;
        $pkField = !empty($primaryKey) ? $primaryKey[0] : 'id';

        $record = Yii::$app->db->createCommand('SELECT * FROM ' . $table . ' WHERE ' . $pkField . ' = :id')
            ->bindValue(':id', $id)
            ->queryOne();

        if (!$record) {
            throw new NotFoundHttpException('Запись не найдена.');
        }

        // Подготовка данных для отображения
        $tableNamesMap = [
            'kind_of_sport' => 'Виды спорта',
            'organisations' => 'Организации',
            'prizewinner' => 'Призовые места',
            'sports_club' => 'Спортивные клубы',
            'sportsman' => 'Спортсмены',
            'structure' => 'Спортивные сооружения',
            'trainers' => 'Тренеры',
        ];

        $columnLabels = [
            'kind_of_sport' => ['name' => 'Название'],
            'organisations' => ['full_name' => 'Название организатора'],
            'prizewinner' => [
                'prize_place' => 'Призовое место',
                'reward' => 'Награда',
            ],
            'sports_club' => ['name' => 'Название клуба'],
            'sportsman' => [
                'name' => 'Имя',
                'discharge' => 'Разряд',
                'id_sports_club' => 'Спортивный клуб',
            ],
            'structure' => [
                'name' => 'Название сооружения',
                'type' => 'Тип',
            ],
            'trainers' => [
                'name' => 'ФИО тренера',
                'id_kind_of_sport' => 'Вид спорта',
            ],
        ];

        // Основные данные записи
        $displayData = [];
        foreach ($record as $field => $value) {
            $label = $columnLabels[$table][$field] ?? $field;

            // Обработка связанных полей
            if (strpos($field, 'id_') === 0 && $value !== null) {
                $relatedTable = substr($field, 3);
                $relatedName = Yii::$app->db->createCommand('SELECT name FROM ' . $relatedTable . ' WHERE id=:id')
                    ->bindValue(':id', $value)
                    ->queryScalar();
                $value = $value . ' (' . ($relatedName ?: 'неизвестно') . ')';
            }

            $displayData[] = [
                'label' => $label,
                'value' => $value,
            ];
        }

        // Получаем связанные данные в зависимости от таблицы
        $relatedData = [];

        switch ($table) {
            case 'kind_of_sport':
                // Соревнования по этому виду спорта
                $relatedData['competitions'] = Yii::$app->db->createCommand('
                    SELECT c.* FROM competitions c
                    WHERE c.id_kind_of_sport = :id
                ')->bindValue(':id', $id)->queryAll();

                // Спортсмены по этому виду спорта
                $relatedData['sportsman'] = Yii::$app->db->createCommand('
                    SELECT s.* FROM sportsman s
                    JOIN sportsman_kind_of_sport sks ON s.id = sks.id_sportsman
                    WHERE sks.id_kind_of_sport = :id
                ')->bindValue(':id', $id)->queryAll();

                // Тренеры по этому виду спорта
                $relatedData['trainers'] = Yii::$app->db->createCommand('
                    SELECT t.* FROM trainers t
                    WHERE t.id_kind_of_sport = :id
                ')->bindValue(':id', $id)->queryAll();
                break;

            case 'organisations':
                // Соревнования, организованные этой организацией
                $relatedData['competitions'] = Yii::$app->db->createCommand('
                    SELECT c.* FROM competitions c
                    JOIN organisations_competitions oc ON c.id = oc.id_competitions
                    WHERE oc.id_organisations = :id
                ')->bindValue(':id', $id)->queryAll();
                break;

            case 'prizewinner':
                // Спортсмены-призеры
                $relatedData['sportsman'] = Yii::$app->db->createCommand('
                    SELECT s.* FROM sportsman s
                    JOIN sportsman_prizewinner sp ON s.id = sp.id_sportsman
                    WHERE sp.id_prizewinner = :id
                ')->bindValue(':id', $id)->queryAll();
                break;

            case 'sports_club':
                // Спортсмены клуба
                $relatedData['sportsman'] = Yii::$app->db->createCommand('
                    SELECT s.* FROM sportsman s
                    WHERE s.id_sports_club = :id
                ')->bindValue(':id', $id)->queryAll();
                break;

            case 'sportsman':
                // Виды спорта спортсмена
                $relatedData['kind_of_sport'] = Yii::$app->db->createCommand('
                    SELECT kos.* FROM kind_of_sport kos
                    JOIN sportsman_kind_of_sport sks ON kos.id = sks.id_kind_of_sport
                    WHERE sks.id_sportsman = :id
                ')->bindValue(':id', $id)->queryAll();

                // Соревнования спортсмена
                $relatedData['competitions'] = Yii::$app->db->createCommand('
                    SELECT c.* FROM competitions c
                    JOIN sportsman_competitions sc ON c.id = sc.id_competitions
                    WHERE sc.id_sportsman = :id
                ')->bindValue(':id', $id)->queryAll();

                // Тренеры спортсмена
                $relatedData['trainers'] = Yii::$app->db->createCommand('
                    SELECT t.* FROM trainers t
                    JOIN sportsman_trainers st ON t.id = st.id_trainers
                    WHERE st.id_sportsman = :id
                ')->bindValue(':id', $id)->queryAll();

                // Призовые места спортсмена
                $relatedData['prizewinner'] = Yii::$app->db->createCommand('
                    SELECT p.* FROM prizewinner p
                    JOIN sportsman_prizewinner sp ON p.id = sp.id_prizewinner
                    WHERE sp.id_sportsman = :id
                ')->bindValue(':id', $id)->queryAll();
                break;

            case 'structure':
                // Соревнования в этом сооружении
                $relatedData['competitions'] = Yii::$app->db->createCommand('
                    SELECT c.* FROM competitions c
                    WHERE c.id_structure = :id
                ')->bindValue(':id', $id)->queryAll();
                break;

            case 'trainers':
                // Вид спорта тренера
                $relatedData['kind_of_sport'] = Yii::$app->db->createCommand('
                    SELECT kos.* FROM kind_of_sport kos
                    WHERE kos.id = :sport_id
                ')->bindValue(':sport_id', $record['id_kind_of_sport'])->queryAll();

                // Спортсмены тренера
                $relatedData['sportsman'] = Yii::$app->db->createCommand('
                    SELECT s.* FROM sportsman s
                    JOIN sportsman_trainers st ON s.id = st.id_sportsman
                    WHERE st.id_trainers = :id
                ')->bindValue(':id', $id)->queryAll();
                break;

            case 'competitions':
                // Вид спорта соревнования
                $relatedData['kind_of_sport'] = Yii::$app->db->createCommand('
                    SELECT kos.* FROM kind_of_sport kos
                    WHERE kos.id = :sport_id
                ')->bindValue(':sport_id', $record['id_kind_of_sport'])->queryAll();

                // Спортивное сооружение
                $relatedData['structure'] = Yii::$app->db->createCommand('
                    SELECT s.* FROM structure s
                    WHERE s.id = :structure_id
                ')->bindValue(':structure_id', $record['id_structure'])->queryAll();

                // Организаторы соревнования
                $relatedData['organisations'] = Yii::$app->db->createCommand('
                    SELECT o.* FROM organisations o
                    JOIN organisations_competitions oc ON o.id = oc.id_organisations
                    WHERE oc.id_competitions = :id
                ')->bindValue(':id', $id)->queryAll();

                // Участники соревнования
                $relatedData['sportsman'] = Yii::$app->db->createCommand('
                    SELECT s.* FROM sportsman s
                    JOIN sportsman_competitions sc ON s.id = sc.id_sportsman
                    WHERE sc.id_competitions = :id
                ')->bindValue(':id', $id)->queryAll();

                // Призовые места соревнования
                $relatedData['prizewinner'] = Yii::$app->db->createCommand('
                    SELECT p.* FROM prizewinner p
                    JOIN sportsman_prizewinner sp ON p.id = sp.id_prizewinner
                    WHERE sp.id_competitions = :id
                ')->bindValue(':id', $id)->queryAll();
                break;
        }

        return $this->render('viewRecord', [
            'record' => $record,
            'tableName' => $table,
            'displayName' => $tableNamesMap[$table] ?? $table,
            'displayData' => $displayData,
            'relatedData' => $relatedData,
            'tableNamesMap' => $tableNamesMap,
        ]);
    }
}
