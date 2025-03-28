<?php

namespace app\modules\admin\models;

use app\models\SportsmanTrainers;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SportsmenTrenersSearch represents the model behind the search form of `app\models\SportsmenTreners`.
 */
class SportsmanTrainersSearch extends SportsmanTrainers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_sportsman', 'id_trainers'], 'integer'],
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
        $query = SportsmanTrainers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_sportsman' => $this->id_sportsman,
            'id_trainers' => $this->id_trainers,
        ]);

        return $dataProvider;
    }
}
