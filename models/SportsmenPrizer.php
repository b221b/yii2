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

    public function getPrizer2()
    {
        return $this->hasOne(Sorevnovaniya::class, ['id_prizer' => 'id_sorevnovaniya']);
    }

    public function getSportsmenPrizers()
    {
        return $this->hasMany(SportsmenPrizer::class, ['id_sorevnovaniya' => 'id']);
    }
}
