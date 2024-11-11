<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Sorevnovaniya;
use app\models\PrizerSearch; // Подключаем новый класс
use yii\data\ActiveDataProvider;

class PrizerController extends Controller
{
    public function actionIndex()
    {
        $model = new PrizerSearch(); // Используем новый класс для валидации

        $sorevnovaniya = Sorevnovaniya::find()->all();
        $prizers = [];

        // Получаем всех призеров при первой загрузке страницы
        $prizers = (new \yii\db\Query())
            ->select(['s.name AS sportsman_name', 'ss.name AS sorevnovanie_name', 'p.mesto', 'p.nagrada'])
            ->from('prizer p')
            ->innerJoin('sportsmen_prizer sp', 'sp.id_prizer = p.id')
            ->innerJoin('sportsmen s', 's.id = sp.id_sportsmen')
            ->innerJoin('sportsmen_sorevnovaniya ssv', 'ssv.id_sportsmen = s.id')
            ->innerJoin('sorevnovaniya ss', 'ss.id = ssv.id_sorevnovaniya')
            ->andWhere(['<=', 'p.mesto', 3]) 
            ->all();

        // Обработка формы для фильтрации по соревнованию
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $sorevnovanie_id = $model->sorevnovanie_id;

            $prizers = (new \yii\db\Query())
                ->select(['s.name AS sportsman_name', 'ss.name AS sorevnovanie_name', 'p.mesto', 'p.nagrada'])
                ->from('prizer p')
                ->innerJoin('sportsmen_prizer sp', 'sp.id_prizer = p.id')
                ->innerJoin('sportsmen s', 's.id = sp.id_sportsmen')
                ->innerJoin('sportsmen_sorevnovaniya ssv', 'ssv.id_sportsmen = s.id')
                ->innerJoin('sorevnovaniya ss', 'ss.id = ssv.id_sorevnovaniya')
                ->where(['ss.id' => $sorevnovanie_id])
                ->andWhere(['<=', 'p.mesto', 3]) 
                ->all();
        }

        return $this->render('index', [
            'model' => $model,
            'sorevnovaniya' => $sorevnovaniya,
            'prizers' => $prizers,
        ]);
    }
}
