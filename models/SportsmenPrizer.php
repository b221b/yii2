<?php

namespace app\models;

use yii\db\ActiveRecord;

class SportsmenPrizer extends ActiveRecord
{
    public static function tableName()
    {
        return 'sportsmen_prizer';
    }

    public function getSportsmen()
    {
        return $this->hasOne(Sportsmen::class, ['id' => 'id_sportsmen']);
    }

    public function getPrizer()
    {
        return $this->hasOne(Prizer::class, ['id' => 'id_prizer']);
    }

    public function getSportsmenPrizers()
    {
        return $this->hasMany(SportsmenPrizer::class, ['id_sorevnovaniya' => 'id']);
    }
}
