<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmenTreners extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsmen_treners';
    }

    public function getSportsmen()
    {
        return $this->hasOne(Sportsmen::class, ['id' => 'id_sportsmen']);
    }

    public function getTreners()
    {
        return $this->hasOne(Treners::class, ['id' => 'id_treners']);
    }
}
