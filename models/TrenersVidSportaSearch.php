<?php

namespace app\models;

use yii\base\Model;

class TrenersVidSportaSearch extends Model
{
    public $sport;

    public function rules()
    {
        return [
            [['sport'], 'required', 'message' => 'Выберите вид спорта.'],
            [['sport'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sport' => 'Вид спорта',
        ];
    }
}
