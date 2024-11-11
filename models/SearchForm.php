<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SearchForm extends Model
{
    public $start_date;
    public $end_date;

    public function rules()
    {
        return [
            [['start_date', 'end_date'], 'required', 'message' => 'Это поле обязательно для заполнения.'],
            [['start_date', 'end_date'], 'date', 'format' => 'php:Y-m-d', 'message' => 'Введите корректную дату в формате YYYY-MM-DD.'],
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
