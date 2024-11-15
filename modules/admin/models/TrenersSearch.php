<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Treners;

/**
 * TrenersSearch represents the model behind the search form of `app\models\Treners`.
 */
class TrenersSearch extends Treners
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_vid_sporta'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
{
    $query = Treners::find()->joinWith('vidSporta'); // Присоединяем связанную таблицу

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);

    $this->load($params);

    if (!$this->validate()) {
        return $dataProvider;
    }

    $query->andFilterWhere(['id' => $this->id])
          ->andFilterWhere(['id_vid_sporta' => $this->id_vid_sporta])
          ->andFilterWhere(['like', 'name', $this->name]);

    return $dataProvider;
}
}
