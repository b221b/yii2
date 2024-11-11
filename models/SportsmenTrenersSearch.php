<?php

namespace app\models;

use yii\base\DynamicModel;

class SportsmenTrenersSearch extends DynamicModel
{
    public $trener_id;
    public $razryad;

    public function rules()
    {
        return [
            [['trener_id'], 'required', 'message' => 'Выберите тренера.'],
            [['razryad'], 'integer', 'message' => 'Разряд должен быть числом.'],
            [['razryad'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'trener_id' => 'Тренер',
            'razryad' => 'Разряд спорстмена',
        ];
    }
}
