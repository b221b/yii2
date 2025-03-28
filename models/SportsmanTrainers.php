<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmanTrainers extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsman_trainers';
    }

    public function getSportsman()
    {
        return $this->hasOne(Sportsman::class, ['id' => 'id_sportsman']);
    }

    public function getTrainers()
    {
        return $this->hasOne(Trainers::class, ['id' => 'id_trainers']);
    }

    public function rules()
    {
        return [
            [['id_sportsman', 'id_trainers'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_sportsman' => 'Спортсмен',
            'id_trainers' => 'Тренер',
        ];
    }
}
