<?php

namespace app\models;

use yii\base\DynamicModel;

class SorevnovaniyaOrgSearch extends DynamicModel
{
    public $startDate;
    public $endDate;
    public $fio;

    public function rules()
    {
        return [
            [['startDate', 'endDate'], 'string'], // Даты должны быть строками
            ['fio', 'integer'], // fio должен быть целым числом
        ];
    }

    public function attributeLabels()
    {
        return [
            'startDate' => 'Дата начала',
            'endDate' => 'Дата окончания',
            'fio' => 'Организаторы',
        ];
    }
}
