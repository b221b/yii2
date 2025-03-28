<?php

namespace app\models;

use yii\base\DynamicModel;

class CompetitionOrganisationSearch extends DynamicModel
{
    public $startDate;
    public $endDate;
    public $full_name;

    public function rules()
    {
        return [
            [['startDate', 'endDate'], 'string'], 
            ['full_name', 'integer'], 
        ];
    }

    public function attributeLabels()
    {
        return [
            'startDate' => 'Дата начала',
            'endDate' => 'Дата окончания',
            'full_name' => 'Организаторы',
        ];
    }
}
