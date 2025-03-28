<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmanKindOfSport extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsman_kind_of_sport';
    }

    public function getSportsman()
    {
        return $this->hasOne(Sportsman::class, ['id' => 'id_sportsman']);
    }

    public function getKindOfSport()
    {
        return $this->hasOne(KindOfSport::class, ['id' => 'id_kind_of_sport']);
    }

    public function rules()
    {
        return [
            [['id_sportsman', 'id_kind_of_sport'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_sportsman' => 'Спортсмен',
            'id_kind_of_sport' => 'Вид спорта',
        ];
    }
}
