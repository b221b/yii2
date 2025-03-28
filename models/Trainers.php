<?php

namespace app\models;

use yii\db\ActiveRecord;

class Trainers extends ActiveRecord
{
    public static function tableName()
    {
        return 'trainers';
    }

    public function getSportsmanTrainers()
    {
        return $this->hasMany(SportsmanTrainers::class, ['id_trainers' => 'id']);
    }

    public function getKindOfSport()
    {
        return $this->hasOne(KindOfSport::class, ['id' => 'id_kind_of_sport']); 
    }


    public function rules()
    {
        return [
            [['name', 'id_kind_of_sport'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'id_kind_of_sport' => 'Вид спорта',
        ];
    }
}
