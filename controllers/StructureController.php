<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Structure;
use app\models\StructureChars;
use app\models\StructureSearch;

class StructureController extends Controller
{
    public function actionIndex()
    {
        $model = new StructureSearch();

        // Получаем уникальные типы структур для выпадающего списка 
        $structureTypes = Structure::find()->select('type')->distinct()->column();
        $tipPokritiyaOptions = StructureChars::find()->select('tip_pokritiya')->distinct()->column();

        // Изначально получаем все записи
        $dataProvider = StructureChars::find()
            ->select(['structure.name', 'structure.type', 'structure_chars.*'])
            ->innerJoinWith('structure')
            ->all();

        // Обработка формы
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Формируем запрос в зависимости от выбранного типа структуры 
            $query = StructureChars::find()
                ->select(['structure.name', 'structure.type', 'structure_chars.*'])
                ->innerJoinWith('structure')
                ->where(['structure.type' => $model->structure_type]);

            // Проверяем каждое поле и добавляем условия только если они не пустые 
            if (!empty($model->tip_pokritiya)) {
                $query->andWhere(['tip_pokritiya' => $model->tip_pokritiya]);
            }
            if (!empty($model->vmestimost)) {
                $query->andWhere(['>=', 'vmestimost', $model->vmestimost]);
            }
            if (!empty($model->kolvo_oborydovaniya)) {
                $query->andWhere(['>=', 'kolvo_oborydovaniya', $model->kolvo_oborydovaniya]);
            }
            if (!empty($model->kolvo_tribun)) {
                $query->andWhere(['>=', 'kolvo_tribun', $model->kolvo_tribun]);
            }

            $dataProvider = $query->all();
        }

        return $this->render('index', [
            'model' => $model,
            'structureTypes' => $structureTypes,
            'tipPokritiyaOptions' => $tipPokritiyaOptions,
            'dataProvider' => $dataProvider,
        ]);
    }
}
