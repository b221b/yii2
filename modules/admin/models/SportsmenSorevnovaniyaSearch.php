<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SportsmenSorevnovaniya;

/**
 * SportsmenSorevnovaniyaSearch represents the model behind the search form of `app\models\SportsmenSorevnovaniya`.
 */
class SportsmenSorevnovaniyaSearch extends SportsmenSorevnovaniya
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_sportsmen', 'id_sorevnovaniya'], 'integer'],
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
        $query = SportsmenSorevnovaniya::find();

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
            'id_sportsmen' => $this->id_sportsmen,
            'id_sorevnovaniya' => $this->id_sorevnovaniya,
        ]);

        return $dataProvider;
    }
}
