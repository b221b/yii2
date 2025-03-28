<?php

namespace app\models;

use yii\base\Model;

class SportsmanSearch extends Model
{
    public $start_date;
    public $end_date;

    public function rules()
    {
        return [
            [['start_date', 'end_date'], 'required', 'message' => 'Пожалуйста, укажите дату.'],
            [['start_date', 'end_date'], 'date', 'format' => 'php:Y-m-d', 'message' => 'Неверный формат даты.'],
            [['end_date'], 'compare', 'compareAttribute' => 'start_date', 'operator' => '>=', 'message' => 'Дата окончания должна быть больше или равна дате начала.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'start_date' => 'Дата начала',
            'end_date' => 'Дата окончания',
        ];
    }
}
