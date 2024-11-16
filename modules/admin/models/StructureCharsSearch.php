<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StructureChars;

/**
 * StructureCharsSearch represents the model behind the search form of `app\models\StructureChars`.
 */
class StructureCharsSearch extends StructureChars
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_structure', 'vmestimost', 'kolvo_oborydovaniya', 'kolvo_tribun'], 'integer'],
            [['tip_pokritiya'], 'safe'],
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
        $query = StructureChars::find()->joinWith('structure');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'structure_chars.id' => $this->id,
            'structure_chars.id_structure' => $this->id_structure,
            'vmestimost' => $this->vmestimost,
            'kolvo_oborydovaniya' => $this->kolvo_oborydovaniya,
            'kolvo_tribun' => $this->kolvo_tribun,
        ]);

        $query->andFilterWhere(['like', 'tip_pokritiya', $this->tip_pokritiya]);

        return $dataProvider;
    }
}
