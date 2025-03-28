<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Sportsman;
use app\modules\admin\models\SportsmanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SportsmanController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new SportsmanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = 7;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Sportsman();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // Проверьте, что поле 'name' действительно заполнено
                if ($model->save()) {
                    // return $this->redirect(['view', 'id' => $model->id]);
                    return $this->redirect(['index']);
                } else {
                    // Вывод ошибок валидации
                    Yii::debug($model->errors, 'model_errors');
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // Проверьте, что поле 'name' действительно заполнено
                if ($model->save()) {
                    // return $this->redirect(['view', 'id' => $model->id]);
                    return $this->redirect(['index']);
                } else {
                    // Вывод ошибок валидации
                    Yii::debug($model->errors, 'model_errors');
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Sportsman::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
