<?php

namespace app\models;

use yii\base\DynamicModel;

class SportsmenTrenersSearch extends DynamicModel
{
    public $trener_id;
    public $discharge;

    public function rules()
    {
        return [
            [['trener_id'], 'required', 'message' => 'Выберите тренера.'],
            [['discharge'], 'integer', 'message' => 'Разряд должен быть числом.'],
            [['discharge'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'trener_id' => 'Тренер',
            'discharge' => 'Разряд спорстмена',
        ];
    }
}
