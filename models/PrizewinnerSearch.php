<?php

namespace app\models;

use yii\base\DynamicModel;

class PrizewinnerSearch extends DynamicModel
{
    public $sorevnovanie_id;

    public function rules()
    {
        return [
            [['competitions_id'], 'required', 'message' => 'Пожалуйста, выберите соревнование.'], // Обязательное поле
        ];
    }

    public function attributeLabels()
    {
        return [
            'competitions_id' => 'Соревнования',
        ];
    }
}
