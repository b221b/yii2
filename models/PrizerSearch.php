<?php

namespace app\models;

use yii\base\DynamicModel;

class PrizerSearch extends DynamicModel
{
    public $sorevnovanie_id;

    public function rules()
    {
        return [
            [['sorevnovanie_id'], 'required', 'message' => 'Пожалуйста, выберите соревнование.'], // Обязательное поле
        ];
    }

    public function attributeLabels()
    {
        return [
            'sorevnovanie_id' => 'Соревнования',
        ];
    }
}
