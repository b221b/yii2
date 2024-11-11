<?php

namespace app\models;

use yii\base\DynamicModel;

class StructureSearch extends DynamicModel
{
    public $structure_type;
    public $vmestimost;
    public $tip_pokritiya;
    public $kolvo_oborydovaniya;
    public $kolvo_tribun;

    public function rules()
    {
        return [
            [['structure_type'], 'required', 'message' => 'Выберите тип структуры.'],
            [['vmestimost', 'tip_pokritiya', 'kolvo_oborydovaniya', 'kolvo_tribun'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'structure_type' => 'Тип структуры',
        ];
    }
}
